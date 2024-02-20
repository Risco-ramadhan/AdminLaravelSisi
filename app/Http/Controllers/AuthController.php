<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->ID_JENIS_USER == '1') {
                return redirect()->intended('admin');
            } elseif ($user->ID_JENIS_USER == '2') {
                return redirect()->intended('user');
            }
        }
        return view('login.view_login');
    }
    public function Register()
    {

        return view('login.view_register');
    }

    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users'), // Menerapkan aturan validasi unik untuk kolom 'email' pada tabel 'users'
                ],
                'password' => 'required',
                'USERNAME' => [
                    'required',
                    'max:255',
                    Rule::unique('users'), // Menerapkan aturan validasi unik untuk kolom 'email' pada tabel 'users'
                ],
                'NAMA_USER' => 'required'
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email telah digunakan',

                'password.required' => 'Password tidak boleh kosong',

                'NAMA_USER.required' => "Nama tidak boleh kosong",
                'USERNAME.required' => "Username tidak boleh kosong"
            ]
        );

        $user = new User();
        $user->NAMA_USER = $request->input('NAMA_USER');
        $user->USERNAME = $request->input('USERNAME');
        $user->STATUS_USER = "Active";
        $user->ID_JENIS_USER = 2;
        $user->CREATE_DATE = now()->format('Y-m-d');
        $user->UPDATE_DATE = now()->format('Y-m-d');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hashing password menggunakan bcrypt
        $user->save();

        // Proses registrasi pengguna berhasil
        return redirect()->route('login')->with('success', 'Pengguna berhasil dibuat!');
    }

    public function login(Request $request)
    {

        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
            ]
        );


        $kredensial = $request->only('email', 'password');
        // dd($kredensial);

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $request->session()->put('ID_JENIS_USER', $user->ID_JENIS_USER);

            if (Auth::check()) {
                return redirect()->intended('admin');

                // if ($user->ID_JENIS_USER == '1') {
                //     return redirect()->intended('admin');
                // } elseif ($user->ID_JENIS_USER == '2') {
                //     return redirect()->intended('admin');
                // }
            }

            return redirect()->intended('/');
        }


        return back()->withErrors([
            'email' => "Maaf email dan password salah"
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

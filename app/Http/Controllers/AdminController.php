<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Menu_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\DBAL\TimestampType;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        return view('layout.dashboard', $data);
    }
    public function DataKaryawan()
    {
        $users = User::all();


        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit' . $user->id . '">
                Edit
                </button>
                <button class="btn btn-xs btn-danger" data-toggle="modal"  data-target="#HapusMenu' . $user->id . '">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function ViewKaryawan()
    {
        $users = User::all();
        $data['users'] = $users;
        $data['title'] = "Karyawan";
        return view('layout.karyawan', $data);
    }

    public function EditUser(Request $request, $id)
    {
        $user = User::where('id', $id);
        // dd($request->input());
        if ($request->input('password') == "") {

            $user->update([
                'NAMA_USER' => $request->input('name'),
                'USERNAME' => $request->input('username'),
                'email' => $request->input('email'),
            ]);
        } else {

            $user->update([
                'NAMA_USER' => $request->input('name'),
                'USERNAME' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);
        }


        return redirect()->route('dataKaryawan')->with('success', 'Menu updated successfully');
    }

    public function TambahUser(Request $request)
    {
        $admin = Auth::user();
        $user = new User;
        $user->insert([
            'NAMA_USER' => $request->input('name'),
            'USERNAME' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'ID_JENIS_USER' => '1',
            'STATUS_USER' => 'Active',
            'CREATE_BY' => $admin->USERNAME,
            'CREATE_DATE' => Carbon::now()
        ]);
        return redirect()->route('dataKaryawan')->with('success', 'Menu updated successfully');
    }


    public function DeleteUser($id)
    {
        $menu = User::where('id', $id);
        $menu->forceDelete();
        return redirect()->route('dataKaryawan')->with('success', 'Menu updated successfully');
    }


    public function DataMenu()
    {
        $menu = Menu::all();
        return DataTables::of($menu)
            ->addColumn('action', function ($menu) {
                return '
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editMenu' . $menu->MENU_ID . '">
                Edit
                </button>
                <button class="btn btn-xs btn-danger" data-toggle="modal"  data-target="#HapusMenu' . $menu->MENU_ID . '">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function ViewMenu()
    {
        $menus = Menu::all();
        $data['allMenus'] = $menus;
        $data['title'] = "Karyawan";
        return view('layout.menu', $data);
    }

    public function editMenu(Request $request, $id)
    {
        $menu = Menu::where('MENU_ID', $id);
        $menu->update([
            'ID_LEVEL' => $request->input('level'),
            'MENU_NAME' => $request->input('name'),
            'MENU_LINK' => $request->input('link'),
            'MENU_ICON' => $request->input('icon'),
            'STATUS_MENU' => $request->input('status'),
            'UPDATE_DATE' => Carbon::now()

        ]);


        return redirect()->route('menu')->with('success', 'Menu updated successfully');
    }
    public function TambahMenu(Request $request)
    {
        $admin = Auth::user();
        $menu = new Menu;
        $menu->insert([
            'ID_LEVEL' => $request->input('level'),
            'MENU_NAME' => $request->input('name'),
            'MENU_LINK' => $request->input('link'),
            'MENU_ICON' => $request->input('icon'),
            'STATUS_MENU' => $request->input('status'),
            'PARENT_ID' => 1,
            'CREATE_BY' => $admin->USERNAME,
            'CREATE_DATE' => Carbon::now()
        ]);
        return redirect()->route('menu')->with('success', 'Menu updated successfully');
    }

    public function DeleteMenu($id)
    {
        $menu = Menu::where('MENU_ID', $id);
        $menu->forceDelete();
        return redirect()->route('menu')->with('success', 'Menu updated successfully');
    }


    public function viewProfile()
    {
        $data['title'] = "Profile";
        return view('layout.profile', $data);
    }
}

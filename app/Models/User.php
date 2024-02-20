<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'NAMA_USER',
        'USERNAME',
        'PASSWORD',
        'EMAIL',
        'NO_HP',
        'WA',
        'PIN',
        'ID_JENIS_USER',
        'STATUS_USER'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'PASSWORD',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function menus()
    // {
    //     return $this->belongsToMany(Menu::class, 'NO_SETTING', 'id', 'MENU_ID');
    // }
    public function getMenu($id)
    {
        $results = [];
        $i = 0;
        $users = DB::table('users')
            ->join('menu_user', 'users.ID_JENIS_USER', '=', 'menu_user.ID_LEVEL')
            ->where('users.ID_JENIS_USER', '=', $id)
            ->select('menu_user.MENU_ID')
            ->orderBy('menu_user.MENU_ID', 'asc')
            ->get();
        // dd($users);
        foreach ($users as  $key => $userMenu) :
            $menus = DB::table('menu')
                ->join('menu_user', 'menu_user.MENU_ID', '=', 'menu.ID_LEVEL')
                ->where('menu_user.MENU_ID', '=', $userMenu->MENU_ID)
                ->where('menu.STATUS_MENU', '=', 'Active')
                ->select('menu.*')
                ->distinct()
                ->get();
            array_push($results, $menus);
        endforeach;

        return $results;
    }
}

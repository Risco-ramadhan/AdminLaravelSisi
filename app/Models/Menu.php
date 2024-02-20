<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    public $timestamps = false;

    protected $fillable = [
        'ID_LEVEL',
        'MENU_NAME',
        'MENU_LINK',
        'MENU_ICON',
        'PARENT_ID',
    ];

    // Definisi relasi many-to-many dengan model User
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'NO_SETTING', 'MENU_ID', 'id');
    // }
}

<?php

namespace Database\Seeders;

use App\Models\Menu_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataMenuUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $table->id('NO_SETING');
        // $table->foreignId('ID_LEVEL', 30);
        // $table->foreignId('MENU_ID', 3);
        $menu = [
            [
                'ID_LEVEL' => '1',
                'MENU_ID' => '1',
            ],
            [
                'ID_LEVEL' => '1',
                'MENU_ID' => '2',
            ],
            [
                'ID_LEVEL' => '2',
                'MENU_ID' => '1',
            ],
        ];
        foreach ($menu as $key => $value) {
            Menu_user::create($value);
        }
    }
}

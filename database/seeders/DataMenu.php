<?php

namespace Database\Seeders;

use App\Models\Menu;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            [
                'ID_LEVEL' => "1",
                'MENU_NAME' => 'Dashboard',
                'MENU_LINK' => 'dashboard',
                'MENU_ICON' => 'fas fa-fw fa-chart-area',
                'PARENT_ID' => '1',
                'STATUS_MENU' => 'Active',
            ],
            [
                'ID_LEVEL' => "1",
                'MENU_NAME' => 'Profile',
                'MENU_LINK' => 'userProfile',
                'MENU_ICON' => 'fas fa-fw fa-solid fa-user',
                'PARENT_ID' => '1',
                'STATUS_MENU' => 'Active',
            ],
            [
                'ID_LEVEL' => "2",
                'MENU_NAME' => 'Data Karyawan',
                'MENU_LINK' => 'dataKaryawan',
                'MENU_ICON' => 'fas fa-fw fa-user',
                'PARENT_ID' => '1',
                'STATUS_MENU' => 'Active',
            ],
            [
                'ID_LEVEL' => "2",
                'MENU_NAME' => 'Menu',
                'MENU_LINK' => 'menu',
                'MENU_ICON' => 'fas fa-fw fa-file',
                'PARENT_ID' => '1',
                'STATUS_MENU' => 'Active',
            ],
        ];

        foreach ($menu as $key => $value) {
            Menu::create($value);
        }
    }
}

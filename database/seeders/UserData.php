<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'NAMA_USER' => "Administrator",
                'USERNAME' => 'admin',
                'password' => bcrypt('admin'),
                'email' => 'admin@gmail.com',
                'NO_HP' => '085793472445',
                'WA' => '085793472445',
                'PIN' => '123456',
                'ID_JENIS_USER' => '1',
                'STATUS_USER' => 'Active'
            ], [
                'NAMA_USER' => "User",
                'USERNAME' => 'user',
                'password' => bcrypt('admin'),
                'email' => 'user@gmail.com',
                'NO_HP' => '085793472445',
                'WA' => '085793472445',
                'PIN' => '123456',
                'ID_JENIS_USER' => '2',
                'STATUS_USER' => 'Active'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

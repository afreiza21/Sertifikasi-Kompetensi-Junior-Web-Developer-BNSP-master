<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'name' => 'Administrator',
                'email' => 'adminpsb@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'username' => 'siswa',
                'name' => 'Siswa Muhamad Ahmadin',
                'email' => 'ahmadinations@gmail.com',
                'password' => Hash::make('siswa'),
                'role' => 'siswa'
            ],
        ];

        DB::table('users')->insert($data);
    }
}

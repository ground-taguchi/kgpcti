<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'club',
                'email' => 'club@mailaddress.com',
                'password' => bcrypt('oideyasu'),
            ],
            [
                'name' => 'crystal',
                'email' => 'crystal@mailaddress.com',
                'password' => bcrypt('oideyasu'),
            ],
            [
                'name' => 'eden',
                'email' => 'eden@mailaddress.com',
                'password' => bcrypt('oideyasu'),
            ],
            [
                'name' => 'rush',
                'email' => 'rush@mailaddress.com',
                'password' => bcrypt('oideyasu'),
            ],
            [
                'name' => 'ane',
                'email' => 'ane@mailaddress.com',
                'password' => bcrypt('oideyasu'),
            ],
        ]);
    }
}

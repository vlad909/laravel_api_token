<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => bcrypt('admin'),
            'avatar' => 'test'
        ]);

        factory(\App\User::class, 10)->create();
    }
}

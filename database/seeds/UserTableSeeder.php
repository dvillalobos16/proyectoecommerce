<?php

use Illuminate\Database\Seeder;
use ecommerce\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        User::create([
            'email' => 'email@ecommerce.test',
            'password' => Hash::make('admin'),
            'name' => 'Administrador'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Flávio Hayashida',
            'email' => 'fmmh18@gmail.com',
            'password' => \Hash::make('jhmcma130902')
        ]);
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('@12345678')
        ]);
    }
}

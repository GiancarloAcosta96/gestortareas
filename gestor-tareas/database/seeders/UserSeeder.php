<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Usuario Prueba',
            'email' => 'usuario_prueba@tarea.com',
            'password' => Hash::make('tarea123'),
        ]);
    }
}
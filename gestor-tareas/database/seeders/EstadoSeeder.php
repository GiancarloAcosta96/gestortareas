<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['nombre' => 'Pendiente']);
        Estado::create(['nombre' => 'En progreso']);
        Estado::create(['nombre' => 'Completada']);
    }
}

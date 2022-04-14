<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_proyecto')->insert([
            [
                'nombre' => 'Personal',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Negocios',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Caridad',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Development',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Viajes',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

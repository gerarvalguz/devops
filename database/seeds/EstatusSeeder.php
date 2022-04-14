<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estatus')->insert([
            [
                'nombre' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Finalizado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Cancelado',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

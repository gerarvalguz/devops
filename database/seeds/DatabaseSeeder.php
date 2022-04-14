<?php

use EstatusSeeder;
use TipoProyectosSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstatusSeeder::class);
        $this->call(TipoProyectosSeeder::class);
    }
}

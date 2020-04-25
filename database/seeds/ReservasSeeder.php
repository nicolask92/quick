<?php

use Illuminate\Database\Seeder;
use App\Reservar;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reservar::class, 200)->create();
    }
}

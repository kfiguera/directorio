<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['id' => 1, 'description' => 'Amazonas']);
        State::create(['id' => 2, 'description' => 'Anzoátegui']);
        State::create(['id' => 3, 'description' => 'Apure']);
        State::create(['id' => 4, 'description' => 'Aragua']);
        State::create(['id' => 5, 'description' => 'Barinas']);
        State::create(['id' => 6, 'description' => 'Bolívar']);
        State::create(['id' => 7, 'description' => 'Carabobo']);
        State::create(['id' => 8, 'description' => 'Cojedes']);
        State::create(['id' => 9, 'description' => 'Delta Amacuro']);
        State::create(['id' => 10, 'description' => 'Falcón']);
        State::create(['id' => 11, 'description' => 'Guárico']);
        State::create(['id' => 12, 'description' => 'Lara']);
        State::create(['id' => 13, 'description' => 'Mérida']);
        State::create(['id' => 14, 'description' => 'Miranda']);
        State::create(['id' => 15, 'description' => 'Monagas']);
        State::create(['id' => 16, 'description' => 'Nueva Esparta']);
        State::create(['id' => 17, 'description' => 'Portuguesa']);
        State::create(['id' => 18, 'description' => 'Sucre']);
        State::create(['id' => 19, 'description' => 'Táchira']);
        State::create(['id' => 20, 'description' => 'Trujillo']);
        State::create(['id' => 21, 'description' => 'Vargas']);
        State::create(['id' => 22, 'description' => 'Yaracuy']);
        State::create(['id' => 23, 'description' => 'Zulia']);
        State::create(['id' => 24, 'description' => 'Distrito Capital']);
        State::create(['id' => 25, 'description' => 'Dependencias Federales']);
    }
}

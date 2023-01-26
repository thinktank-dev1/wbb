<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\VehicleBodyType;

class BodyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Double Cab', 'Single Cab', 'Super Cab', 'SUV', 'MPV', 'Hatchback', 'Crossover', 'Sedan', 'Coupe', 'Cabriolet'];
        foreach($arr AS $r){
            VehicleBodyType::create([
                'name' => $r
            ]);
        }

    }
}

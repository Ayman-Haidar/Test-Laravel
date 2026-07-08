<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Car::create([
        //     'name' => 'Toyota Camry',
        //     'model' => '2022',
        //     'details' => 'A comfortable midsize sedan with great fuel efficiency.',
        // ]);
        Car::factory()->count(10)->create();
    }
}

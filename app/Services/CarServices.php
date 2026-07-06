<?php

namespace App\Services;

use App\Models\Car;

class CarServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data) {
        // $car = Car::create($data);

        $car = Car::create([
            'name' => $data['name'],
            'model' => $data['model'],
            'details' => $data['details'],
        ]);


        return $car;
    }

    public function update(Car $car, array $data) {
        $car->update($data);
        return $car;
    }

    public function destroy(Car $car) {
        $car->delete();
        return true;
    }
    




    public function index(){
        $Cars= Car::query()->get();
        return $Cars;
    }



}

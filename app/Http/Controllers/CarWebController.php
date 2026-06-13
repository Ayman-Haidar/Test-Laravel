<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarWebController extends Controller
{
    public function index() {
        $Cars= Car::query()->get();
        return view('cars.index',compact('Cars'));
    }
    public function create () {
        return view ('cars.create');
    }

    public function store () {
        request()->validate([
            'name' => 'required|string',
            'model' => 'required|string',
            'details' => 'required|string',
        ]);

        $car = Car::query()->create([
            'name' => request()->name,
            'model' => request()->model,
            'details' => request()->details,
        ]);
        return redirect()->route('cars');
    }

    public function update(Request $request,Car $car) {
        $car ->update($request->all());
        return redirect()->route('cars');
    }

    public function edit(Car $car) {
        return view('cars.update', compact('car'));
    }

    public function delete(Car $car) {
        $car->delete();
        return redirect()->route('cars');
    }

}

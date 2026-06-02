<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use Illuminate\Http\Request;

class CarController extends Controller
{
     public function store(StoreCarRequest $request, Car $car) {
        $validated = $request->validated([
            'name' => 'required|string',
            'model' => 'required|string',
            'details' => 'required|array',]);


         $car ->create($validated);

        return $car;
        // return $request->all();
        }



        // public function store(Request $request) {
        //     $car = car::query()->create([
        //         'name' => $request->name,
        //         'model' => $request->model,
        //         'details' => $request->details,
        //     ]);
        // }



        //  public function store(Request $request, Car $car) {
        //     $car ->create([
        //         'name' => $request->name,
        //         'model' => $request->model,
        //         'details' => $request->details,
        //     ]);
        // }


        public function update(Request $request,Car $car) {
            $car ->update($request->all());
            return $car;
        }

        // public function update(Request $request, $id) {
        //     $cars = car::query()->where('id', $id)->update([
        //         'name' => $request->name,
        //         'model' => $request->model,
        //         'details' => $request->details,
        //     ]);
        //     return $cars;
        // }




        // public function update(Request $request,Car $car) {
        //     $car ->update([
        //         'name' => $request->name,
        //         'model' => $request->model,
        //         'details' => $request->details,
        //     ]);
        //     return $car;
        // }




        // public function destroy($id) {
        //     $cars = car::query()->where('id', $id)->delete();
        //     return $cars;
        // }



         public function destroy(Car $car) {
            $car ->delete();
            return $car;
        }


        // public function show($id) {
        //     $cars = car::query()->where('id', $id)->get();
        //     return $cars;
        // }


        public function show(Car $car) {
            return $car;
        }

        public function index() {
             $cars = car::query()->get();
             return $cars;
         }


        // public function index(Car $car) {
        //      $car ->get();
        //      return $car;
        //  }لا ستطيع ان تضع كولكشن في فانكشن واحد لانها راح ترجع لك عنصر واحد فقط
}

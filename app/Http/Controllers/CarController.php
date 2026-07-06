<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Services\CarServices;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(protected CarServices $carServices){}
     public function store(StoreCarRequest $storeCarRequest) {
        $validated = $storeCarRequest->validated();
        $this->carServices->store($validated);
        //  $car ->create($validated);

        // return $car;
        // return $storeCarRequest->all();
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


        public function update(UpdateCarRequest $updateCarRequest,Car $car) {
            $validated = $updateCarRequest->validated();
            $this->carServices->update($car,$validated);
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
            $this->carServices->destroy($car);
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
             $cars = $this->carServices->index();
             return $cars;
         }


        // public function index(Car $car) {
        //      $car ->get();
        //      return $car;
        //  }لا ستطيع ان تضع كولكشن في فانكشن واحد لانها راح ترجع لك عنصر واحد فقط
}

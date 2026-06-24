<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProductController;
use App\Models\MedicalFile;
use App\Models\Student;
use App\Models\User;
use App\Models\Car;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::prefix('products')->group(function () {

//     Route::post('/', function (Request $request) {
//         $product = DB::table('products')->insert(
//             $request->products
//         );

//         return $product;
//     });

//     Route::delete('/{id}', function ($id) {
//         $product = DB::table('products')->where('id', $id)->delete();

//         return $product;
//     });

//     Route::get('/{id}', function ($id) {
//         $product = DB::table('products')->where('id', $id)->get();

//         return $product;
//     });

//     Route::get('/', function () {
//     $product = DB::table('products')->get();
//     return $product;
// });

// });

// Route::post('products', function () {
//     $product = DB::table('products')->insert(
//         [
//             [
//                 'name' => 'Example Product',
//                 'description' => 'This is an example product.',
//                 'price' => 19.99,
//             ]
//     ]

//     );
// return $product;

// });

// route::delete('products/{id}', function ($id) {
//     $product = DB::table('products')->where('id', $id)->delete();
//     return $product;
// });

// route::get('products/{id}', function ($id) {
//     $product = DB::table('products')->where('id', $id)->get();
//     return $product;
// });



Route::get('users/{user}', function (User $user) {
    return $user;
});

// Route::post('cars', function (Car $car) {
//     car::query()->create([
//         'name' => 'Porsche',
//         'model' => '911',
//     ]);
// });
// Route::get ('cars', function() {
//     $cars = car::query()->get();
//     return $cars;
// });

// Route::delete ('cars/{id}', function($id) {
//     $cars = car::query()->where('id', $id)->delete();
//     return $cars;
// });

// Route::get ('cars/{id}', function($id) {
//     $cars = car::query()->where('id', $id)->get();
//     return $cars;
// });

// Route::put('cars/{id}', function(Request $request, $id) {
//     $cars = car::query()->where('id', $id)->update([
//         'name' => $request->name,
//         'model' => $request->model,
//     ]);
//     return $cars;
// });


// Route::prefix('cars')->group(function () {

// Route::post('/', [CarController::class, 'store']);

// Route::get ('/', [CarController::class, 'index']);

// Route::delete ('/{car}', [CarController::class, 'destroy']);

// Route::get ('/{car}', [CarController::class, 'show']);

// Route::put('/{car}', [CarController::class, 'update']);

// });

// Route::apiResource('products', ProductController::class);

// Route::post('products/{product}/reduce-stock', [ProductController::class, 'reduceStock']);

Route::post('address', function(Request $request) {
    $user = User::query()->create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    // return 1;


    $address = $user->addresses()->create([
        'city' => $request->city,
        'country' => $request->country,

    ]);

    return $address;
});



Route::post('create-role-user', function(Request $request) {
    $user = User::query()->create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    $role = Role::query()->create([
        'role_name' => $request->role_name,
    ]);


});

Route::post('assign-role-to-user/{user}/{role}', function(User $user, Role $role) {
    $user->roles()->syncWithoutDetaching($role->id);

    // $user->roles()->attach($role, ['date' => now()]);

    return [
        'user' => $user,
        'role' => $role,
        'date' => now(),
    ];
});

Route::post('student', function (Request $request) {
    $student = Student::query()->create([
        'name' => $request->name,
        'phone' => $request->phone,
    ]);

    return [
        'student' => $student,
    ];

});

Route::post('medical-file',function(Request $request){
    $existe = MedicalFile::where('student_id',$request->student_id)->exists();
    if ($existe){
        return response()->json([
            'message' => 'Medical file already exists for this student.',
        ],422);

    }

    $medicalFile = MedicalFile::create([
        'blood_type' => $request->blood_type,
        'emergency_phone_number' => $request->emergency_phone_number,
        'student_id' => $request->student_id,
    ]);
        return $medicalFile;


});
Route::get('/students/{student}', function (Student $student) {
    $student->load('medicalFile');

    return $student;
});

Route::get('/students/{student}/medical-file', function (Student $student) {
    $student->load('medicalFile');

    if (!$student->medicalFile) {
        return response()->json([
            'message' => 'No medical file found for this student.',
        ], 404);
    }

    return $student->medicalFile;
});


Route::put('/medical-files/{medicalFile}', function (Request $request, MedicalFile $medicalFile) {

    $medicalFile->update([
        'blood_type' => $request->blood_type ?? $medicalFile->blood_type,
        'emergency_phone' => $request->emergency_phone ?? $medicalFile->emergency_phone,
    ]);

    return $medicalFile;
});


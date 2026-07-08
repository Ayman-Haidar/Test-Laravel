<?php

namespace App\Models;

use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'model', 'details'])]
// #[Hidden(['model'])]
#[UseFactory(CarFactory::class)]

class Car extends Model
{
    // protected function casts(): array
    // {
    //     return [
    //         'details' => 'array',
    //     ];
    // }

    use HasFactory;


}

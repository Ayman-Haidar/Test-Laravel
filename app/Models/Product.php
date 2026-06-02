<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['name', 'description', 'price', 'quantity'])]
#[Hidden(['created_at', 'updated_at'])]
class Product extends Model
{
    //
}

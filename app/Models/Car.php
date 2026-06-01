<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'model', 'details'])]
#[Hidden(['model'])]

class Car extends Model
{
    protected function casts(): array
    {
        return [
            'details' => 'array',
        ];
    }


}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Fillable;

use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['city', 'country', 'user_id'])]


class Address extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}

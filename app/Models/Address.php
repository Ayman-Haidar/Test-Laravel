<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Fillable;

use Illuminate\Database\Eloquent\Model;
#[Fillable(['city', 'country', 'user_id'])]

class Address extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

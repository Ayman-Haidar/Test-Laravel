<?php

namespace App\Models;


use App\CategoryEnum;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
// #[Fillable(['name', 'description', 'price', 'category'])]
// #[Hidden([ 'updated_at'])]
class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'category'];
    public function casts(){
        return [
            'category' => CategoryEnum::class,
        ];
    }

}

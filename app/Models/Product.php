<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    //from db
    protected $fillable = ['image', 'title', 'description', 'price', 'category_id'];

    function categories() {
        return $this->hasOne(Category::class);
    }
}

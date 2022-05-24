<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'price',
        'discount',
        'condition',
        'status',
        'short',
        'desc',
        'img',
        'new',
        'feature',
        'popular',
        'best',
    ];

}

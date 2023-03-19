<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 
        'title', 
        'sub_title', 
        'image_01', 
        'image_02', 
        'image_03', 
        'image_04', 
        'image_05', 
        'sub_description', 
        'description', 
        'icon',
        'order',
        'status', 
        'demo_link',
        'meta_title', 
        'meta_description'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
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
        'service_schema',
        'faq_schema',
        'description', 
        'icon',
        'order',
        'status', 
        'meta_title', 
        'meta_description'
    ];
}

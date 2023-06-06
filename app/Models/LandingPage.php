<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 
        'name',
        'hero_title', 
        'hero_description', 
        'video',
        'intro_title', 
        'intro_description',
        'image_01', 
        'content_title', 
        'description', 
        'status', 
        'meta_title', 
        'meta_description', 
        'schema',
        'faq_schema',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'caption', 'title', 'sub_title', 'main_text', 'cta_01_text', 'cta_01_link', 'cta_02_text', 'cta_02_link', 'image', 'order', 'status'];
}

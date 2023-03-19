<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cta extends Model
{
    use HasFactory;
    protected $table    = 'ctas';
    protected $fillable = ['location', 'caption', 'title', 'sub_title', 'main_text', 'cta_text', 'cta_link', 'image', 'video'];
}

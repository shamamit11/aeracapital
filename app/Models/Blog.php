<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'sub_title', 'main_image', 'description', 'date', 'posted_by', 'status', 'meta_title', 'meta_description'];
}

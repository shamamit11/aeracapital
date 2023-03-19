<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkProcess extends Model
{
    use HasFactory;
    protected $table    = 'work_processes';
    protected $fillable = ['image', 'title', 'caption', 'order'];
}

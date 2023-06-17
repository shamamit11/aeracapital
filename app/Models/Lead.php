<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'mobile', 'company', 'website', 'package', 'addons', 'business_consultation', 'business_solutions', 'development', 'marketing'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'caption', 'title', 'sub_title', 'main_text', 'icon_01', 'icon_01_caption', 'icon_01_text', 'icon_02', 'icon_02_caption', 'icon_02_text', 'list_icon', 'list_01_text', 'list_02_text', 'list_03_text', 'list_04_text', 'list_05_text', 'list_06_text', 'image'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsContent extends Model
{
    use HasFactory;

    protected $fillable = ['cms_id', 'name', 'description', 'meta_title', 'meta_description'];

    public function cms()
    {
        return $this->belongsTo(Cms::class, 'cms_id', 'id'); 
    }
}

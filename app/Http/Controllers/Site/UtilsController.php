<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;

class UtilsController extends Controller
{
    public function generateSitemap()
    {
       Artisan::call('sitemap:generate');
       return Redirect::to(env('APP_URL').'/sitemap.xml');
    }
}

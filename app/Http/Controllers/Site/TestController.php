<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        return view('site.test', compact('nav', 'sub_nav', 'page_title'));
    }
}

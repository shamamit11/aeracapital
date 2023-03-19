<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialLinkRequest;
use App\Services\Admin\SocialLinkService;
use Illuminate\Http\Request;
use App\Models\SocialLink;

class SocialLinkController extends Controller
{
    protected $social;

    public function __construct(SocialLinkService $SocialLinkService)
    {
        $this->social = $SocialLinkService;
    }

    public function index(Request $request)
    {
        $nav = 'social';
        $sub_nav = '';
        $page_title = ' Social Links';
        $data['row'] = SocialLink::first();
        $data['action'] = route('admin-social-link-addaction');
        return view('admin.social-link.index', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(SocialLinkRequest $request)
    {
        return $this->social->store($request->validated());
    }
}

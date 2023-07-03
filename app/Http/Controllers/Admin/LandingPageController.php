<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LandingPageRequest;
use App\Http\Requests\Admin\SlugRequest; 
use App\Services\Admin\LandingPageService;
use Illuminate\Http\Request;
use App\Models\LandingPage;
use Helper;

class LandingPageController extends Controller
{
    protected $landing;

    public function __construct(LandingPageService $LandingPageService)
    {
        $this->landing = $LandingPageService;
    }

    public function index(Request $request)
    {
        $nav = 'landing';
        $page_title = 'Landing Pages';
        $sub_nav = '';
        $per_page = 100;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $result = $this->landing->list($per_page, $page, $q);
        return view('admin.landing_page.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        return $this->landing->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'landing';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Landing Page" : "Edit Landing Page";
        $data['action'] = route('admin-landing-page-addaction');
        $data['order'] = \App\Helpers\Helper::getMax('services', 'order');
        $data['row'] = LandingPage::where('id', $id)->first();
        return view('admin.landing_page.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(LandingPageRequest $request)
    {
        return $this->landing->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->landing->delete($request);
    }

    public function slug(SlugRequest $request)
    {
        return $this->landing->slug($request->validated());
    }
}

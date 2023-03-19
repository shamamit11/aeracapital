<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SeoRequest;
use App\Services\Admin\SeoService;
use Illuminate\Http\Request;

use App\Models\Seo;

class SeoController extends Controller
{
    protected $seo;

    public function __construct(SeoService $SeoService)
    {
        $this->seo = $SeoService;
    }

    public function index(Request $request)
    {
        $nav = 'seo';
        $page_title = 'SEO Management';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $result = $this->seo->list($per_page, $page, $q);
        return view('admin.seo.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        $this->seo->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'seo';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add SEO" : "Edit SEO";
        $data['action'] = route('admin-seo-addaction');
        $data['row'] = Seo::where('id', $id)->first();
        return view('admin.seo.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(SeoRequest $request)
    {
        return $this->seo->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->seo->delete($request);
    }

}

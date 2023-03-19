<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CmsRequest;
use App\Http\Requests\Admin\SlugRequest; 
use App\Services\Admin\CmsService;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\CmsContent;

class CmsController extends Controller
{
    protected $cms;

    public function __construct(CmsService $CmsService)
    {
        $this->cms = $CmsService;
    }

    public function index(Request $request)
    {
        $nav = 'cms';
        $page_title = 'CMS Pages';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $result = $this->cms->list($per_page, $page, $q);
        return view('admin.cms.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        return $this->cms->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'cms';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add CMS Page" : "Edit CMS Page";
        $data['action'] = route('admin-cms-addaction');
        $data['row'] = CmsContent::where('id', $id)->first();
        return view('admin.cms.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(CmsRequest $request)
    {
        return $this->cms->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->cms->delete($request);
    }

    public function slug(SlugRequest $request)
    {
        return $this->cms->slug($request->validated());
    }

}

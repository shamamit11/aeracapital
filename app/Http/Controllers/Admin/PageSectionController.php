<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageSectionRequest;
use App\Services\Admin\PageSectionService;
use Illuminate\Http\Request;
use App\Models\PageSection;

class PageSectionController extends Controller
{
    protected $pagesection;

    public function __construct(PageSectionService $PageSectionService)
    {
        return $this->pagesection = $PageSectionService;
    }

    public function index(Request $request)
    {
        $nav = 'pagesection';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $page_title = 'Page Sections';
        $result = $this->pagesection->list($per_page, $page, $q);
        return view('admin.pagesection.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        $this->pagesection->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'pagesection';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Page Section" : "Edit Page Section";
        $data['action'] = route('admin-pagesection-addaction');
        $data['row'] = PageSection::where('id', $id)->first();
        return view('admin.pagesection.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(PageSectionRequest $request)
    {
        return $this->pagesection->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->pagesection->delete($request);
    }
}

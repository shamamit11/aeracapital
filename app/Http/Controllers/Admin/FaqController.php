<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Services\Admin\FaqService;
use Illuminate\Http\Request;
use App\Models\Faq;
use Helper;

class FaqController extends Controller
{
    protected $faq;

    public function __construct(FaqService $FaqService)
    {
        $this->faq = $FaqService;
    }

    public function index(Request $request)
    {
        $nav = 'faq';
        $page_title = 'Faqs';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $result = $this->faq->list($per_page, $page, $q);
        return view('admin.faq.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        return $this->faq->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'faq';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Faq" : "Edit Faq";
        $data['action'] = route('admin-faq-addaction');
        $data['order'] = Helper::getMax('faqs', 'order');
        $data['row'] = Faq::where('id', $id)->first();
        return view('admin.faq.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(FaqRequest $request)
    {
        return $this->faq->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->faq->delete($request);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CtaRequest;
use App\Services\Admin\CtaService;
use Illuminate\Http\Request;
use App\Models\Cta;
use Helper;

class CtaController extends Controller
{
    protected $cta;

    public function __construct(CtaService $CtaService)
    {
        return $this->cta = $CtaService;
    }

    public function index(Request $request)
    {
        $nav = 'cta';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $page_title = 'CTAs';
        $result = $this->cta->list($per_page, $page, $q);
        return view('admin.cta.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function addEdit(Request $request)
    {
        $nav = 'cta';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add CTA" : "Edit CTA";
        $data['action'] = route('admin-cta-addaction');
        $data['row'] = Cta::where('id', $id)->first();
        return view('admin.cta.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(CtaRequest $request)
    {
        return $this->cta->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->cta->delete($request);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Services\Admin\LeadService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    protected $lead;

    public function __construct(LeadService $LeadService)
    {
        $this->lead = $LeadService;
    }

    public function index(Request $request)
    {
        $nav = 'lead';
        $page_title = 'Leads';
        $sub_nav = '';
        $per_page = 100;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $result = $this->lead->list($per_page, $page, $q);
        return view('admin.lead.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }


    public function view(Request $request)
    {
        $nav = 'lead';
        $sub_nav = '';
        $id = $request->id;
        $data['title'] = $page_title = "View Lead";
        $data['row'] = Lead::where('id', $id)->first();
        return view('admin.lead.view', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function update(Request $request)
    {
        return $this->lead->update($request);
    }

    public function delete(Request $request)
    {
        return $this->lead->delete($request);
    }
}

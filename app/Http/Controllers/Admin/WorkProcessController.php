<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkProcessRequest;
use App\Services\Admin\WorkProcessService;
use Illuminate\Http\Request;
use App\Models\WorkProcess;
use Helper;

class WorkProcessController extends Controller
{
    protected $workprocess;

    public function __construct(WorkProcessService $WorkProcessService)
    {
        return $this->workprocess = $WorkProcessService;
    }

    public function index(Request $request)
    {
        $nav = 'workprocess';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $page_title = 'Work Process';
        $result = $this->workprocess->list($per_page, $page, $q);
        return view('admin.workprocess.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function addEdit(Request $request)
    {
        $nav = 'workprocess';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add WorkProcess" : "Edit WorkProcess";
        $data['action'] = route('admin-workprocess-addaction');
        $data['order'] = Helper::getMax('work_processes', 'order');
        $data['row'] = WorkProcess::where('id', $id)->first();
        return view('admin.workprocess.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(WorkProcessRequest $request)
    {
        return $this->workprocess->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->workprocess->delete($request);
    }
}

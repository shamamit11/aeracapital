<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Requests\Admin\SlugRequest; 
use App\Services\Admin\ServiceService;
use Illuminate\Http\Request;
use App\Models\Service;
use Helper;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(ServiceService $ServiceService)
    {
        $this->service = $ServiceService;
    }

    public function index(Request $request)
    {
        $nav = 'service';
        $page_title = 'Services';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $result = $this->service->list($per_page, $page, $q);
        return view('admin.service.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'service';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Service" : "Edit Service";
        $data['action'] = route('admin-service-addaction');
        $data['order'] = Helper::getMax('services', 'order');
        $data['row'] = Service::where('id', $id)->first();
        return view('admin.service.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(ServiceRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->service->delete($request);
    }
    
    public function imageDelete(Request $request)
    {
        return $this->service->imageDelete($request);
    }

    public function slug(SlugRequest $request)
    {
        return $this->service->slug($request->validated());
    }
}

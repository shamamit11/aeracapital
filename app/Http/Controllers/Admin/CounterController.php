<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CounterRequest;
use App\Services\Admin\CounterService;
use Illuminate\Http\Request;
use App\Models\Counter;
use Helper;

class CounterController extends Controller
{
    protected $counter;

    public function __construct(CounterService $CounterService)
    {
        return $this->counter = $CounterService;
    }

    public function index(Request $request)
    {
        $nav = 'counter';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $page_title = 'Counters';
        $result = $this->counter->list($per_page, $page, $q);
        return view('admin.counter.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function addEdit(Request $request)
    {
        $nav = 'counter';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Counter" : "Edit Counter";
        $data['action'] = route('admin-counter-addaction');
        $data['order'] = Helper::getMax('counters', 'order');
        $data['row'] = Counter::where('id', $id)->first();
        return view('admin.counter.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(CounterRequest $request)
    {
        return $this->counter->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->counter->delete($request);
    }
}

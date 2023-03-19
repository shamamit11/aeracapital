<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Services\Admin\TestimonialService;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Helper;

class TestimonialController extends Controller
{
    protected $testimonial;

    public function __construct(TestimonialService $TestimonialService)
    {
        return $this->testimonial = $TestimonialService;
    }

    public function index(Request $request)
    {
        $nav = 'testimonial';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $page_title = 'Testimonials';
        $result = $this->testimonial->list($per_page, $page, $q);
        return view('admin.testimonial.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        $this->testimonial->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'testimonial';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Testimonial" : "Edit Testimonial";
        $data['action'] = route('admin-testimonial-addaction');
        $data['order'] = Helper::getMax('testimonials', 'order');
        $data['row'] = Testimonial::where('id', $id)->first();
        return view('admin.testimonial.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(TestimonialRequest $request)
    {
        return $this->testimonial->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->testimonial->delete($request);
    }
}

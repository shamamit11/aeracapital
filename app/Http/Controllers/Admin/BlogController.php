<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\Admin\SlugRequest; 
use App\Services\Admin\BlogService;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    protected $blog;

    public function __construct(BlogService $BlogService)
    {
        $this->blog = $BlogService;
    }

    public function index(Request $request)
    {
        $nav = 'blog';
        $page_title = 'Blogs';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $result = $this->blog->list($per_page, $page, $q);
        return view('admin.blog.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        return $this->blog->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'blog';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Blog" : "Edit Blog";
        $data['action'] = route('admin-blog-addaction');
        $data['row'] = Blog::where('id', $id)->first();
        return view('admin.blog.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(BlogRequest $request)
    {
        return $this->blog->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->blog->delete($request);
    }

    public function slug(SlugRequest $request)
    {
        return $this->blog->slug($request->validated());
    }

}

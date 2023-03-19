<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\SlugRequest; 
use App\Services\Admin\ProductService;
use Illuminate\Http\Request;
use App\Models\Product;
use Helper;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductService $ProductService)
    {
        $this->product = $ProductService;
    }

    public function index(Request $request)
    {
        $nav = 'product';
        $page_title = 'Products';
        $sub_nav = '';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $result = $this->product->list($per_page, $page, $q);
        return view('admin.product.index', compact('nav', 'sub_nav', 'page_title'), $result);
    }

    public function status(Request $request)
    {
        return $this->product->status($request);
    }

    public function addEdit(Request $request)
    {
        $nav = 'product';
        $sub_nav = '';
        $id = ($request->id) ? $request->id : 0;
        $data['title'] = $page_title = ($id == 0) ? "Add Product" : "Edit Product";
        $data['action'] = route('admin-product-addaction');
        $data['order'] = Helper::getMax('products', 'order');
        $data['row'] = Product::where('id', $id)->first();
        return view('admin.product.add', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function addAction(ProductRequest $request)
    {
        return $this->product->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->product->delete($request);
    }
    
    public function imageDelete(Request $request)
    {
        return $this->product->imageDelete($request);
    }

    public function slug(SlugRequest $request)
    {
        return $this->product->slug($request->validated());
    }
}

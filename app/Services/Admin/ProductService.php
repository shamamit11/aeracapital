<?php
namespace App\Services\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Helper;

class ProductService
{
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Product::select('*');
            if ($q) {
                $query->where('title', 'LIKE', '%' . $q . '%');
            }
            $data['products'] = $query->orderBy('id', 'desc')->paginate($per_page);
            $data['products']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['products']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['products']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['products']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['products']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {

        try {
            Product::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $product = Product::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $product = new Product;
                $message = "Data added";
            }
            
            $product->slug = $request['slug'];
            $product->title = $request['title'];
            $product->sub_title = $request['sub_title'];
            $product->image_01 = $request['image_01'];
            $product->sub_description = $request['sub_description'];
            $product->description = $request['description'];
            $product->icon = $request['icon'];
            $product->order = $request['order'];
            $product->demo_link = $request['demo_link'];
            $product->status = isset($request['status']) ? 1 : 0;
            $product->meta_title = ($request['meta_title']) ? $request['meta_title'] : $request['name'];
            $product->meta_description = ($request['meta_description']) ? $request['meta_description'] : Str::limit(strip_tags($request['short_description']), 200, '');
            $product->save();
            $response['message'] = $message;
            $response['errors'] = false;
            $response['status_code'] = 201;
            return response()->json($response, 201);
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function delete($request)
    {
        try {
            $id = $request->id;
            Product::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function slug($request)
    {
        try {
            $slug = Helper::getSlug("products", "slug", $request['name'], $request['id']);
            $response['slug'] = $slug;
            $response['errors'] = false;
            $response['status_code'] = 200;
            return response()->json($response, 200);
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

<?php
namespace App\Services\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Helper;

class BlogService
{
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Blog::select('*');
            if ($q) {
                $query->where('title', 'LIKE', '%' . $q . '%');
            }
            $data['blogs'] = $query->orderBy('id', 'desc')->paginate($per_page);
            $data['blogs']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['blogs']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['blogs']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['blogs']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['blogs']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {

        try {
            Blog::where('id', $request->id)
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
                $blog = Blog::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $blog = new Blog;
                $message = "Data added";
            }
            $blog->slug = $request['slug'];
            $blog->title = $request['title'];
            $blog->sub_title = $request['sub_title'];
            $blog->main_image = $request['main_image'];
            $blog->description = $request['description'];
            $blog->date = date('Y-m-d', strtotime($request['date']));
            $blog->posted_by = $request['posted_by'];
            $blog->status = isset($request['status']) ? 1 : 0;
            $blog->meta_title = ($request['meta_title']) ? $request['meta_title'] : $request['name'];
            $blog->meta_description = ($request['meta_description']) ? $request['meta_description'] : Str::limit(strip_tags($request['short_description']), 200, '');
            $blog->save();
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
            Blog::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function slug($request)
    {
        try {
            $slug = Helper::getSlug("blogs", "slug", $request['name'], $request['id']);
            $response['slug'] = $slug;
            $response['errors'] = false;
            $response['status_code'] = 200;
            return response()->json($response, 200);
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

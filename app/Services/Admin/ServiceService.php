<?php
namespace App\Services\Admin;

use App\Models\Service;
use Illuminate\Support\Str;
use Helper;

class ServiceService
{
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Service::select('*');
            if ($q) {
                $query->where('title', 'LIKE', '%' . $q . '%');
            }
            $data['services'] = $query->orderBy('id', 'desc')->paginate($per_page);
            $data['services']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['services']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['services']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['services']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['services']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {

        try {
            Service::where('id', $request->id)
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
                $service = Service::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $service = new Service;
                $message = "Data added";
            }
            
            $service->slug = $request['slug'];
            $service->title = $request['title'];
            $service->sub_title = $request['sub_title'];
            $service->image_01 = $request['image_01'];
            $service->sub_description = $request['sub_description'];
            $service->description = $request['description'];
            $service->icon = $request['icon'];
            $service->order = $request['order'];
            $service->status = isset($request['status']) ? 1 : 0;
            $service->meta_title = ($request['meta_title']) ? $request['meta_title'] : $request['name'];
            $service->meta_description = ($request['meta_description']) ? $request['meta_description'] : Str::limit(strip_tags($request['short_description']), 200, '');
            $service->save();
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
            Service::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function slug($request)
    {
        try {
            $slug = Helper::getSlug("services", "slug", $request['name'], $request['id']);
            $response['slug'] = $slug;
            $response['errors'] = false;
            $response['status_code'] = 200;
            return response()->json($response, 200);
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

<?php
namespace App\Services\Admin;

use App\Models\Banner;

class BannerService
{

    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Banner::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['banners'] = $query->orderBy('order', 'desc')->paginate($per_page);
            $data['banners']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['banners']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['banners']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['banners']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['banners']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Banner::where('id', $request->id)
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
                $banner = Banner::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $banner = new Banner;
                $message = "Data added";
            }
            $banner->name = $request['name'];
            $banner->location = $request['location'];
            $banner->caption = $request['caption'];
            $banner->title = $request['title'];
            $banner->sub_title = $request['sub_title'];
            $banner->main_text = $request['main_text'];
            $banner->cta_01_text = $request['cta_01_text'];
            $banner->cta_01_link = $request['cta_01_link'];
            $banner->cta_02_text = $request['cta_02_text'];
            $banner->cta_02_link = $request['cta_02_link'];
            $banner->image = $request['image'];
            $banner->order = $request['order'];
            $banner->status = isset($request['status']) ? 1 : 0;
            $banner->save();
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
            $ras = Banner::findOrFail($id);
            Banner::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

<?php
namespace App\Services\Admin;

use App\Models\Seo;

class SeoService
{
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Seo::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['seos'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['seos']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['seos']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['seos']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['seos']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['seos']->count();
            }
            return $data;
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $seo = Seo::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $seo = new Seo;
                $message = "Data added";
            }
            $seo->name = $request['name'];
            $seo->url = $request['url'];
            $seo->meta_title = $request['meta_title'];
            $seo->meta_description = $request['meta_description'];
            $seo->save();
            $response['message'] = $message;
            $response['errors'] = false;
            $response['status_code'] = 201;
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function delete($request)
    {
        try {
            $id = $request->id;
            Seo::where('id', $id)->delete();
            return "success";
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

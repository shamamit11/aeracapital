<?php
namespace App\Services\Admin;

use App\Models\Cta;

class CtaService
{

    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Cta::select('*');
            if ($q) {
                $query->where('caption', 'LIKE', '%' . $q . '%');
            }
            $data['ctas'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['ctas']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['ctas']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['ctas']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['ctas']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['ctas']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $cta = Cta::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $cta = new Cta;
                $message = "Data added";
            }
            $cta->location = $request['location'];
            $cta->caption = $request['caption'];
            $cta->title = $request['title'];
            $cta->sub_title = $request['sub_title'];
            $cta->main_text = $request['main_text'];
            $cta->image = $request['image'];
            $cta->video = $request['video'];
            $cta->cta_text = $request['cta_text'];
            $cta->cta_link = $request['cta_link'];
            $cta->save();
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
            $ras = Cta::findOrFail($id);
            Cta::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

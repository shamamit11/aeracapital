<?php
namespace App\Services\Admin;

use App\Models\WorkProcess;

class WorkProcessService
{

    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = WorkProcess::select('*');
            if ($q) {
                $query->where('title', 'LIKE', '%' . $q . '%');
            }
            $data['workprocesses'] = $query->orderBy('order', 'desc')->paginate($per_page);
            $data['workprocesses']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['workprocesses']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['workprocesses']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['workprocesses']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['workprocesses']->count();
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
                $workprocess = WorkProcess::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $workprocess = new WorkProcess;
                $message = "Data added";
            }
            $workprocess->title = $request['title'];
            $workprocess->caption = $request['caption'];
            $workprocess->image = $request['image'];
            $workprocess->order = $request['order'];
            $workprocess->save();
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
            $ras = WorkProcess::findOrFail($id);
            WorkProcess::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

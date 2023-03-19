<?php
namespace App\Services\Admin;

use App\Models\Counter;

class CounterService
{

    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Counter::select('*');
            if ($q) {
                $query->where('title', 'LIKE', '%' . $q . '%');
            }
            $data['counters'] = $query->orderBy('order', 'desc')->paginate($per_page);
            $data['counters']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['counters']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['counters']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['counters']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['counters']->count();
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
                $counter = Counter::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $counter = new Counter;
                $message = "Data added";
            }
            $counter->title = $request['title'];
            $counter->caption = $request['caption'];
            $counter->image = $request['image'];
            $counter->order = $request['order'];
            $counter->save();
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
            $ras = Counter::findOrFail($id);
            Counter::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

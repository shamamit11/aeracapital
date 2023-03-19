<?php
namespace App\Services\Admin;

use App\Models\Client;

class ClientService
{

    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Client::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['clients'] = $query->orderBy('order', 'desc')->paginate($per_page);
            $data['clients']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['clients']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['clients']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['clients']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['clients']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Client::where('id', $request->id)
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
                $client = Client::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $client = new Client;
                $message = "Data added";
            }
            $client->name = $request['name'];
            $client->website = $request['website'];
            $client->order = $request['order'];
            $client->status = isset($request['status']) ? 1 : 0;
            $client->image = $request['image'];
            $client->save();
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
            $ras = Client::findOrFail($id);
            Client::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

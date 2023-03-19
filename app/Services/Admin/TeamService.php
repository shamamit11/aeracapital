<?php
namespace App\Services\Admin;

use App\Models\Team;

class TeamService
{

    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Team::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['teams'] = $query->orderBy('order', 'desc')->paginate($per_page);
            $data['teams']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['teams']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['teams']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['teams']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['teams']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Team::where('id', $request->id)
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
                $team = Team::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $team = new Team;
                $message = "Data added";
            }
            $team->name = $request['name'];
            $team->position = $request['position'];
            $team->image = $request['image'];
            $team->facebook = $request['facebook'];
            $team->twitter = $request['twitter'];
            $team->instagram = $request['instagram'];
            $team->linkedin = $request['linkedin'];
            $team->order = $request['order'];
            $team->status = isset($request['status']) ? 1 : 0;
            $team->save();
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
            $ras = Team::findOrFail($id);
            Team::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

<?php
namespace App\Services\Admin;

use App\Models\Lead;

class LeadService
{
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Lead::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
                $query->orWhere('email', 'LIKE', '%' . $q . '%');
                $query->orWhere('mobile', 'LIKE', '%' . $q . '%');
                $query->orWhere('company', 'LIKE', '%' . $q . '%');
                $query->orWhere('package', 'LIKE', '%' . $q . '%');
            }
            $data['leads'] = $query->orderBy('created_at', 'desc')->paginate($per_page);
            $data['leads']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['leads']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['leads']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['leads']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['leads']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function update($request)
    {
        try {
            Lead::where('id', $request->id)
                ->update([
                    'comment' => $request->comment,
                ]);

                $response['message'] = "Data Updated";
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
            Lead::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

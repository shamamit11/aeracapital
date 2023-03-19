<?php
namespace App\Services\Admin;

use App\Models\Faq;

class FaqService
{
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Faq::select('*');
            if ($q) {
                $query->where('title', 'LIKE', '%' . $q . '%');
            }
            $data['faqs'] = $query->orderBy('id', 'desc')->paginate($per_page);
            $data['faqs']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['faqs']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['faqs']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['faqs']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['faqs']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {

        try {
            Faq::where('id', $request->id)
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
                $faq = Faq::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $faq = new Faq;
                $message = "Data added";
            }
            
            $faq->title = $request['title'];
            $faq->description = $request['description'];
            $faq->order = $request['order'];
            $faq->status = isset($request['status']) ? 1 : 0;
            $faq->save();
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
            Faq::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

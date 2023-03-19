<?php
namespace App\Services\Admin;

use App\Models\Testimonial;

class TestimonialService
{

    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Testimonial::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['testimonials'] = $query->orderBy('order', 'desc')->paginate($per_page);
            $data['testimonials']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['testimonials']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['testimonials']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['testimonials']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['testimonials']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Testimonial::where('id', $request->id)
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
                $testimonial = Testimonial::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $testimonial = new Testimonial;
                $message = "Data added";
            }
            $testimonial->name = $request['name'];
            $testimonial->position = $request['position'];
            $testimonial->image = $request['image'];
            $testimonial->review = $request['review'];
            $testimonial->rating = $request['rating'];
            $testimonial->order = $request['order'];
            $testimonial->status = isset($request['status']) ? 1 : 0;
            $testimonial->save();
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
            $ras = Testimonial::findOrFail($id);
            Testimonial::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

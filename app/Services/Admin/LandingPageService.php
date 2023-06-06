<?php
namespace App\Services\Admin;

use App\Models\LandingPage;
use Illuminate\Support\Str;
use Helper;

class LandingPageService
{
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = LandingPage::select('*');
            if ($q) {
                $query->where('hero_title', 'LIKE', '%' . $q . '%');
            }
            $data['landing_pages'] = $query->paginate($per_page);
            $data['landing_pages']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['landing_pages']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['landing_pages']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['landing_pages']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['landing_pages']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {

        try {
            LandingPage::where('id', $request->id)
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
                $landing = LandingPage::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $landing = new LandingPage;
                $message = "Data added";
            }
            $landing->name = $request['name'];
            $landing->slug = $request['slug'];
            $landing->hero_title = $request['hero_title'];
            $landing->hero_description = $request['hero_description'];
            $landing->video = $request['video'];
            $landing->intro_title = $request['intro_title'];
            $landing->intro_description = $request['intro_description'];
            $landing->image_01 = $request['image_01'];
            $landing->content_title = $request['content_title'];
            $landing->description = $request['description'];
            $landing->status = isset($request['status']) ? 1 : 1;
            $landing->meta_title = ($request['meta_title']) ? $request['meta_title'] : $request['hero_title'];
            $landing->meta_description = ($request['meta_description']) ? $request['meta_description'] : Str::limit(strip_tags($request['hero_description']), 200, '');
            $landing->schema = $request['schema'];
            $landing->faq_schema = $request['faq_schema'];
            $landing->save();
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
            LandingPage::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function slug($request)
    {
        try {
            $slug = \App\Helpers\Helper::getSlug("landing_pages", "slug", $request['name'], $request['id']);
            $response['slug'] = $slug;
            $response['errors'] = false;
            $response['status_code'] = 200;
            return response()->json($response, 200);
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

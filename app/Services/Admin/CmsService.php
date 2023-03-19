<?php
namespace App\Services\Admin;

use App\Models\Cms;
use App\Models\CmsContent;
use Illuminate\Support\Str;
use Helper;

class CmsService
{
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = CmsContent::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['cmss'] = $query->orderBy('cms_id', 'asc')->paginate($per_page);
            $data['cmss']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['cmss']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['cmss']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['cmss']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['cmss']->count();
            }
            return $data;
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {

        try {
            $a = Cms::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
                return "success";

        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $cms = Cms::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $cms = new Cms;
                $message = "Data added";
            }
            $cms->slug = $request['slug']; 
            $cms->is_footer_link = isset($request['is_footer_link']) ? 1 : 0; 
            $cms->save();

            $cms_id = $cms->id;
            if ($request['id']) {
                 $content = CmsContent::where(array('cms_id' => $cms_id))->first();
            } else {
                $content = new CmsContent;
            }

            $name = $request['name'];
            $description = $request['description'];

            $content->name =  $name;
            $content->cms_id = $cms_id;
            $content->description = $description;
            $content->meta_title = ($request['meta_title']) ? $request['meta_title'] : $name;
            $content->meta_description = ($request['meta_description']) ? $request['meta_description'] : Str::limit(strip_tags($description), 200, '');
            $content->save();
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
            CmsContent::where('id', $id)->delete();
            return "success";
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function slug($request)
    {
        try {
            $slug = Helper::getSlug("cms", "slug", $request['name'], $request['id']);
            $response['slug'] = $slug;
            $response['errors'] = false;
            $response['status_code'] = 200;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

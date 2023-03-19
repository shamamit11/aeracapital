<?php
namespace App\Services\Admin;

use App\Models\PageSection;

class PageSectionService
{

    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = PageSection::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['pagesections'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['pagesections']->appends(array('q' => $q));
            if ($page != 1) {
                $data['total_data'] = $data['pagesections']->total();
                $data['count'] = ($per_page * $page) - $per_page + 1;
                $data['from_data'] = $data['count'];
                $to_data = $page * $data['pagesections']->count();
                $data['to_data'] = ($to_data > $data['from_data']) ? $to_data : $data['total_data'];
            } else {
                $data['total_data'] = $data['pagesections']->total();
                $data['count'] = 1;
                $data['from_data'] = 1;
                $data['to_data'] = $data['pagesections']->count();
            }
            return $data;
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            PageSection::where('id', $request->id)
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
                $pagesection = PageSection::findOrFail($id);
                $message = "Data updated";
            } else {
                $id = 0;
                $pagesection = new PageSection;
                $message = "Data added";
            }
            $pagesection->name = $request['name'];
            $pagesection->caption = $request['caption'];
            $pagesection->title = $request['title'];
            $pagesection->sub_title = $request['sub_title'];
            $pagesection->main_text = $request['main_text'];
            $pagesection->icon_01 = $request['icon_01'];
            $pagesection->icon_01_caption = $request['icon_01_caption'];
            $pagesection->icon_01_text = $request['icon_01_text'];
            $pagesection->icon_02 = $request['icon_02'];
            $pagesection->icon_02_caption = $request['icon_02_caption'];
            $pagesection->icon_02_text = $request['icon_02_text'];
            $pagesection->list_icon = $request['list_icon'];
            $pagesection->list_01_text = $request['list_01_text'];
            $pagesection->list_02_text = $request['list_02_text'];
            $pagesection->list_03_text = $request['list_03_text'];
            $pagesection->list_04_text = $request['list_04_text'];
            $pagesection->list_05_text = $request['list_05_text'];
            $pagesection->list_06_text = $request['list_06_text'];
            $pagesection->image = $request['image'];
            $pagesection->save();
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
            $ras = PageSection::findOrFail($id);
            PageSection::where('id', $id)->delete();
            return "success";
        } catch (\Exception$e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

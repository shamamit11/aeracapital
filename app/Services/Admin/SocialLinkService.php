<?php
namespace App\Services\Admin;

use App\Models\SocialLink;

class SocialLinkService
{
    public function store($request)
    {
        try {
            SocialLink::truncate();
            $social = new SocialLink;
            $social->facebook = $request['facebook'];
            $social->instagram = $request['instagram'];
            $social->twitter = $request['twitter'];
            $social->youtube = $request['youtube'];
            $social->whatsapp = $request['whatsapp'];
            $social->linkedin = $request['linkedin'];
            $social->save();
            $message = "Data updated";
            $response['message'] = $message;
            $response['errors'] = false;
            $response['status_code'] = 201;
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}

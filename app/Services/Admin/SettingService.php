<?php
namespace App\Services\Admin;

use App\Models\Setting;

class SettingService
{
    public function store($request)
    {
        try {
            Setting::truncate();

            $setting = new Setting;

            if (preg_match('#^data:image.*?base64,#', $request['logo_large'])) {
                $logo_large = $this->StoreBase64Image($request['logo_large'], '/settings/');
            } else {
                $logo_large = ($setting) ? $setting->logo_large : '';
            }

            if (preg_match('#^data:image.*?base64,#', $request['logo_small'])) {
                $logo_small = $this->StoreBase64Image($request['logo_small'], '/settings/');
            } else {
                $logo_small = ($setting) ? $setting->logo_small : '';
            }

            $setting->business_name = $request['business_name'];
            $setting->logo_large = $logo_large;
            $setting->logo_small = $logo_small;
            $setting->email = $request['email'];
            $setting->address = $request['address'];
            $setting->phone = $request['phone'];
            $setting->opening_hour = $request['opening_hour'];
            $setting->vat_no = $request['vat_no'];
            $setting->meta_title = $request['meta_title'];
            $setting->meta_description = $request['meta_description'];
            $setting->google_site_verification = $request['google_site_verification'];
            $setting->google_map = $request['google_map'];
            $setting->google_analytics = $request['google_analytics'];
            $setting->ext_js_scripts = $request['ext_js_scripts'];
            $setting->save();
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

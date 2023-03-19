<?php

namespace App\Http\Requests\Admin;
use App\Http\Requests\ApiRequest;

class SettingRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'business_name' => 'required',
            'logo_large' => 'sometimes',
            'logo_small' => 'sometimes',
            'email' => 'required',
            'address' => 'sometimes',
            'phone' => 'sometimes',
            'opening_hour' => 'sometimes',
            'vat_no' => 'sometimes',
            'meta_title' => 'sometimes',
            'meta_description' => 'sometimes',
            'google_site_verification' => 'sometimes',
            'google_map' => 'sometimes',
            'google_analytics' => 'sometimes',
            'ext_js_scripts' => 'sometimes',
        ];
    }
}

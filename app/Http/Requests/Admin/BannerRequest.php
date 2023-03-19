<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class BannerRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'integer|nullable',
            'name' => 'required',
            'location' => 'required',
            'caption' => 'required',
            'title' => '',
            'sub_title' => '',
            'main_text' => '',
            'cta_01_text' => '',
            'cta_01_link' => '',
            'cta_02_text' => '',
            'cta_02_link' => '',
            'image' => 'required',
            'order' => 'required|integer',
            'status' => 'nullable',
        ];
    }
}

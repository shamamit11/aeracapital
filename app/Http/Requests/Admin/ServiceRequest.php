<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class ServiceRequest extends ApiRequest
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
            'slug' => 'required|unique:services,slug,'.$this->id,
            'title' => 'required',
            'sub_title' => 'required',
            'image_01' => 'required',
            'image_02' => '',
            'image_03' => '',
            'image_04' => '',
            'image_05' => '',
            'sub_description' => '',
            'description' => 'required',
            'icon' => 'required',
            'order' => 'required|integer',
            'status' => 'nullable',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image_01.required' => __('Service Image is required.'),
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class ProductRequest extends ApiRequest
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
            'slug' => 'required|unique:products,slug,'.$this->id,
            'title' => 'required',
            'sub_title' => '',
            'image_01' => 'required',
            'image_02' => '',
            'image_03' => '',
            'image_04' => '',
            'image_05' => '',
            'sub_description' => '',
            'description' => 'required',
            'icon' => '',
            'order' => 'required|integer',
            'status' => 'nullable',
            'demo_link' => 'nullable',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image_01.required' => __('Product Image is required.'),
        ];
    }
}

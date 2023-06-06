<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class LandingPageRequest extends ApiRequest
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
            'slug' => 'required|unique:landing_pages,slug,'.$this->id,
            'name' => 'required',
            'hero_title' => 'required',
            'hero_description' => 'required',
            'video' => '',
            'intro_title' => 'required',
            'intro_description' => 'required',
            'image_01' => '',
            'content_title' => 'required',
            'description' => 'required',
            'status' => 'nullable',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'schema' => '',
            'faq_schema' => '',
        ];
    }

    public function messages()
    {
        return [
            'hero_title.required' => __('Title is required.'),
        ];
    }
}

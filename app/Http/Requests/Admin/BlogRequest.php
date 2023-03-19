<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class BlogRequest extends ApiRequest
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
            'slug' => 'required|unique:blogs,slug,'.$this->id,
            'title' => 'required',
            'sub_title' => 'sometimes',
            'main_image' => 'sometimes',
            'description' => 'required',
            'date' => 'required',
            'posted_by' => 'sometimes',
            'status' => 'sometimes',
            'meta_title' => 'sometimes',
            'meta_description' => 'sometimes',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class TestimonialRequest extends ApiRequest
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
            'position' => '',
            'image' => '',
            'review' => 'required',
            'rating' => 'required|integer',
            'order' => 'required|integer',
            'status' => 'nullable',
        ];
    }
}

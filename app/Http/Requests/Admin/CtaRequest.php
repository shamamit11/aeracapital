<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class CtaRequest extends ApiRequest
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
            'location' => 'required',
            'caption' => '',
            'title' => 'required',
            'sub_title' => '',
            'main_text' => '',
            'image' => '',
            'video' => '',
            'cta_text' => 'required',
            'cta_link' => 'required'
        ];
    }
}

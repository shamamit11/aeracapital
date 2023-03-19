<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class WorkProcessRequest extends ApiRequest
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
            'image' => 'required',
            'title' => 'required',
            'caption' => 'required',
            'order' => 'required|integer'
        ];
    }
}

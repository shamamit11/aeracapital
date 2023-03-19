<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ApiRequest;

class TeamRequest extends ApiRequest
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
            'image' => 'required',
            'position' => 'required',
            'facebook' => ($this->facebook) ? 'url' : '',
            'twitter' => ($this->twitter) ? 'url' : '',
            'instagram' => ($this->instagram) ? 'url' : '',
            'linkedin' => ($this->linkedin) ? 'url' : '',
            'order' => 'required|integer',
            'status' => 'nullable',
        ];
    }
}

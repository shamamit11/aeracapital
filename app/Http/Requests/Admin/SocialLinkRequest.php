<?php

namespace App\Http\Requests\Admin;
use App\Http\Requests\ApiRequest;

class SocialLinkRequest extends ApiRequest
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
            'facebook' => 'sometimes',
            'instagram' => 'sometimes',
            'twitter' => 'sometimes',
            'youtube' => 'sometimes',
            'whatsapp' => 'sometimes',
            'linkedin' => 'sometimes',
        ];
    }
}

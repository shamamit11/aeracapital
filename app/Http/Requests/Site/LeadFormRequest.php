<?php

namespace App\Http\Requests\Site;

use App\Http\Requests\WebRequest;

class LeadFormRequest extends WebRequest
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
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'company' => 'required',
            'website' => '',
            'package' => '',
            'addons' => '',
            'business_consultation' => '',
            'business_solutions' => '',
            'development' => '',
            'marketing' => '',
            'comment' => ''
        ];
    }
}

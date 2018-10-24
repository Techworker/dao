<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'organization_name' => 'required|string',
            'street' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'country' => [
                'required',
                Rule::in(array_keys(include base_path('vendor/umpirsky/country-list/data/en/country.php')))
            ]
        ];
    }
}

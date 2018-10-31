<?php

namespace App\Http\Requests;

use App\MoneyValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProposalRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'proposed_value' => 'required|string',
            'proposed_currency' => [
                'required',
                Rule::in(array_keys(MoneyValue::TYPES))
            ]
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\MoneyValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

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
            'proposal-title' => 'required|string',
            'proposal-description' => 'required|string',
            'proposal-proposed-value' => 'required|string',
            'proposal-proposed-currency' => [
                'required',
                Rule::in(array_keys(MoneyValue::TYPES))
            ]
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->sometimes('proposal-document-1-title', 'required', function ($input) {
            return $input['proposal-document-1-file'] instanceof UploadedFile;
        });
        $validator->sometimes('proposal-document-2-title', 'required', function ($input) {
            return $input['proposal-document-2-file'] instanceof UploadedFile;
        });
        $validator->sometimes('proposal-document-3-title', 'required', function ($input) {
            return $input['proposal-document-3-file'] instanceof UploadedFile;
        });
    }
}

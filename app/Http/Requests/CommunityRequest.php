<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommunityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     *
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules()
    {
        return [
            //
            'permalink' => [
                Rule::unique('communities')->ignore($this->community)
            ]
        ];
    }
}

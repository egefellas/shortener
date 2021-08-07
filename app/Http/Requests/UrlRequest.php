<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'link' => 'required|active_url|url|min:10|max:50',
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'The field is required.',
            'link.active_url' => 'The field must be minimum 10 character.',
            'link.url' => 'The field under validation must be a valid URL.',
            'link.min' => 'The field must be minimum 10 character.',
            'link.max' => 'The field can be maximum 50 character',
        ];
    }
}

<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'max:3000'
            ],
            'release_year' => [
                'required',
                'date_format:Y',
            ],
        ];
    }
}

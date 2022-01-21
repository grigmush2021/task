<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddToFavouritesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'film_id' => [
                'required',
                'integer',
                'exists:films,id',
                Rule::unique('user_favourites', 'film_id')->where('user_id', $this->user()->id),
            ]
        ];
    }
}

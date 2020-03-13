<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStore extends ApiFormRequest
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
            'data'                     => 'required',
            'data.type'                => 'required|in:books',
            'data.attributes.title'    => 'required|max:100',
            'data.attributes.author'   => 'required|max:100',
            'data.attributes.released' => 'required|date',
        ];
    }
}

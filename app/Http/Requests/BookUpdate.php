<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdate extends ApiFormRequest
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
            'data.id'                  => 'required',
            'data.type'                => 'required|in:books',
            'data.attributes.title'    => 'required_without_all:data.attributes.author,data.attributes.released|max:100',
            'data.attributes.author'   => 'required_without_all:data.attributes.title,data.attributes.released|max:100',
            'data.attributes.released' => 'required_without_all:data.attributes.title,data.attributes.author|date',
        ];
    }
}

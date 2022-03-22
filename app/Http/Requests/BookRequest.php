<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // public function authorize()
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'authors' => 'required',
            'isbn' => 'required',
            'image_url' => 'required',
            'pages' => 'required',
            'language_code' => 'nullable',
            'in_stock' => 'required',
            'description' => 'nullable',
            'released_at' => 'nullable'
        ];
    }
}

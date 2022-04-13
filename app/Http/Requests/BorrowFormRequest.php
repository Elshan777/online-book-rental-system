<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowFormRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'reader_id' => 'required', 
            'book_id' => 'required', 
            'status'  => 'nullable', 
            'request_processed_at'  => 'required', 
            'request_managed_by' => 'nullable', 
            'deadline' => 'nullable', 
            'returned_at' => 'nullable', 
            'return_managed_by' => 'nullable'
        ];
    }
}

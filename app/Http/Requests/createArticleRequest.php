<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createArticleRequest extends FormRequest
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
            "title"=>"required|max:255",
            "content"=>"required",
            "description"=>"required" ,
            "tags"=>"required|regex:/^([A-Za-z0-9]+,)*[A-Za-z0-9]+$/",
            'cover1' => 'max:2048'
        ];
    }
}

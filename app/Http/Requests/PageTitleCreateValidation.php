<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageTitleCreateValidation extends FormRequest
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
            'page_titles_name'=>'required|unique:page_titles,page_titles_name',

        ];
    }
    public function messages()
    {
        return [
            'page_titles_name.required'=>" Page title Name can't be Empty",
            "pagees.title.unique"=>"Page must be Unique",
        ];
    }
}

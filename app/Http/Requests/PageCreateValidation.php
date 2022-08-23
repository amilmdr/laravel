<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageCreateValidation extends FormRequest
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
        $id=$this->page;
        if(empty($id)){
            
        return [
         
         //rule for PageModel   
            'pages_title' => 'required|min:4',
            'pages_slug' => 'required|unique:pages,pages_slug',
            'pages_description' => 'required',
            'pages_pageTitle' => 'required',
            'pages_image' => 'required',
        ];
    }
    else{
        return[
            'pages_title' => 'required|min:4',
            'pages_slug' =>'required|unique:pages,pages_slug,'.$this->page.',pages_id',
            'pages_description' => 'required' ,
            'pages_pageTitle' => 'required',

        ];
    }
    }
    public function messages()
    {
        return [
            'pages_title.required'=>" Page title can't be Empty",
            "pagees.title.min"=>"Page alphabate must be greater than 4 character or equals ",
            'pages_slug.slug'=>"Sluge can't be Empty",
            'pages_slug.unique'=>"Slug must be Unique",
            'pages_description.description'=>" Page Description  can't be Empty",
            'pages_pageTitle.required'=>"PageTitle is required",
            "pages_image.required"=>"Image can't be Empty",


         

        ];
    }
}

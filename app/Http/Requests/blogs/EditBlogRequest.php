<?php

namespace App\Http\Requests\blogs;

use App\Http\Traits\RequestValidationErrorTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditBlogRequest extends FormRequest
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
            'title'=>'required|string',
            'file'=>'file',
            'category_id'=>'required|exists:categories,id',
            'content'=>'required',
            'meta_title'=>'required|string',
            'meta_description'=>'required|string'
        ];
    }



}

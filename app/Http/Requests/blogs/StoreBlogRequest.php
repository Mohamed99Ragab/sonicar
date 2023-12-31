<?php

namespace App\Http\Requests\blogs;

use App\Traits\RequestValidationErrorTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'file'=>'required|file',
            'category_id'=>'required|exists:categories,id',
            'content'=>'required',
            'meta_title'=>'required|string',
            'meta_description'=>'required|string'
        ];
    }
}

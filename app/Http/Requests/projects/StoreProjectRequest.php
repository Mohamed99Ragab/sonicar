<?php

namespace App\Http\Requests\projects;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'description'=>'required|string',
            'home_img'=>'required|image',
            'url'=>'required|url',
            'delevired_items'=>'array',
            'files'=>'array',
            'category'=>'required|string'

        ];
    }
}

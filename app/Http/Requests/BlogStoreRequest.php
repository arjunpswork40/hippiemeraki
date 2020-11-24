<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|integer',
            'banner_image' => 'required_if::priority,null|file|mimes:jpg,jpeg,png,bmp',
            'thumbnail_image' => 'required_if::priority,null|file|mimes:jpg,jpeg,png,bmp',
        ];
    }
    public function messages()
    {

        
        return [
            'title.required' => 'title field is required',
            'description.required' => 'Description field can not be empty',
            'priority.required' => 'priority is required',
            'banner_image.required' => 'Image is required',
            'banner_image.mimes' => 'Unsupported file format',
            'thumbnail_image.required' => 'Image is required',
            'thumbnail_image.mimes' => 'Unsupported file format',
        ];
    }
}
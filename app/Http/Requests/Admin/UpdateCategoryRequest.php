<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{

    public function rules(){
        return [
            'name' => 'string|unique:categories,name,' . request()->route('category')->id,
            'description' => 'string|nullable',
        ];
    }
}

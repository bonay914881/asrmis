<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommoCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'commo_code' => ['required'],
            'commo_category' => ['required'],
            'commo_desc' => ['required'],
            'category_group_id' => ['required'],
            'category_id' => ['required'],
        ];
    }
}

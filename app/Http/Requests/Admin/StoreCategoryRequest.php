<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:150',
            'url' => ['required', 'max:150', Rule::unique('categories', 'url')],
            'short_text' => 'max:255',
            'content' => 'required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'lang_id' => 'required',
            'is_active' => 'required',
            'in_tags' => 'required'
        ];
    }
}

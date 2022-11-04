<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:160', Rule::unique('blog', 'name')],
            'url' => ['required', 'max:160', Rule::unique('blog', 'url')],
            'short_text' => 'max:255',
            'content' => 'required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'country_id' => 'required',
            'is_active' => 'required',
            'psych_id' => 'required',
            'category_id' => 'required',
        ];
    }
}

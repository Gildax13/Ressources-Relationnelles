<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RessourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'slug' => 'required|max:20',
            'content' => 'required',
            'icon' => 'required',
            'file' => 'required',
            'category_id'=>'unique:category',
            'type_id'=>'unique:type',
            'user_id'=>'unique:user',
        ];
    }
}

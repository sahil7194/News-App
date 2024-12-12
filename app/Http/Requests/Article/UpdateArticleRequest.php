<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "require|string|min:3|max:150",
            "body" => "require|string|min:3|max:150",
            "summary" => "require|string|min:3|max:150",
            "image_url" => "require|string|min:3|max:150",
            "author_id" => "require|int|exists:authors,id"
        ];
    }
}

<?php

namespace Hossam\LaravelOcr\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OcrImageRequest extends FormRequest
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
            'image' => 'required|image',
            'user_words' => 'file|mimetypes:text/plain',
        ];
    }
}

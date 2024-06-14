<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Post;

class PostRequest extends FormRequest
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
        $id = $this->route('post');
        return [
            'title'                  => ['required', 'string', 'min:3', 'max:191', Rule::unique(Post::class)->ignore($id)],
            'description'                   => ['required','string','max:1000'],
            'image'         => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048']
        ];
    }
}

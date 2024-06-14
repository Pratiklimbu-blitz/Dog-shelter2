<?php

namespace App\Http\Requests;

use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
        $id = $this->route('comment');

        return [
            'post_id'                  => ['required'],
            'name'                   => ['required','string','max:191'],
            'email'         => ['nullable', 'email',  'max:191'],
            'comment' => ['required','string','max:1000'],
        ];
    }
}

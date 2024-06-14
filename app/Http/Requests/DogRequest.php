<?php

namespace App\Http\Requests;

use App\Constants\DogStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DogRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $statusList = array_keys(DogStatus::LIST);
        $status = implode(',', $statusList);
        return [
            'name'              =>          ['required', 'string', 'max:191'],
            'description'       =>          ['required', 'string', 'max:255'],
            'status'            =>          ['required', 'string', "in:$status"],
            'category'          =>          ['required', 'string',  'exists:categories,id'],
            'image'             =>          ['required_without:image_hidden_value', 'nullable', 'image', 'max:2048'],
        ];
    }
}

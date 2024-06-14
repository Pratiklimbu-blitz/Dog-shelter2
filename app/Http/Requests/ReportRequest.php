<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ReportRequest extends FormRequest
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
        $id = $this->route('report');
        //defining rules
        $rules = [
            'subject' => ['required', 'string', 'max:191'],
            'message' => [
                'required',
                'string',
                'max:191'

            ],
            'sender_name' => [
                'required',
                'string',
                'max:191',
            ],
            'sender_email' => [
                'required',
                'email',
                'max:191',
            ],
            'sender_phone' => [

                'required','numeric','digits:10'
            ],
            'location' => [
                'required',
                'string',
                'max:191',
            ],
        ];


        return $rules;
    }
}

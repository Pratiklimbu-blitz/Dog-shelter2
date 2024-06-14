<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Volunteer;

class VolunteerRequest extends FormRequest
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
        $id = $this->route('volunteer');
        //defining rules
        $rules = [
            'name' => ['required', 'string', 'max:191'],
            'email' => [ 'required','string','email','max:191', Rule::unique(Volunteer::class)->ignore($id),   ],
            'description'       =>          ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10'],

        ];

      
        return $rules;;
    }
}

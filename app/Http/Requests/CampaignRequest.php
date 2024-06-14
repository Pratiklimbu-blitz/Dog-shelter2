<?php

namespace App\Http\Requests;

use App\Models\Campaign;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CampaignRequest extends FormRequest
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
        $id = $this->route('campaign');
        return [
            'title'                  => ['required', 'string', 'min:3', 'max:191', Rule::unique(Campaign::class)->ignore($id)],
            'description'                   => ['required','string','max:1000'],
            'poster'         => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'collected_amount' => ['required','string','max:1000'],
        ];
    }
}

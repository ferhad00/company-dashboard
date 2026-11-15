<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name'=>'required|string',
            'user_ids' => 'required|array|min:3',
            'user_ids.*' => 'exists:users,id',
            'manager_id' => 'required|exists:users,id',


        ];
    }
    public function messages()
    {
      return [
        'name.required'=>'name is required.',
        'members.required'=>'please select the members of team.',
        'members.min'=>'the team must hav 3 members at least.',
        'manager.required'=>'please choose the manager.'


    ];

    }
}

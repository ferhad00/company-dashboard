<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    { if($this->method()=='PUT')
        {
            return ['username'=>'string|min:3|max:50',
            'password'=>'nullable|string|min:8'];
        }
        else
        return [
            'username'=>'required|string|min:3|max:50',
            'password'=>'required|string|min:8',
            'isAdmin'=>'sometimes|boolean'
        ];
    }
    public function messages()
    {
        if($this->method()=='PUT')
        {
           return ['username.min'=>'username must be at least 3 characters.',
            'user.max'=>'user must be less than 50 characters.',
            'password.min'=>'pasword must be at least 8 characters.',];


        }
     else
     return [
      'username.required'=>'username is required.',
      'username.min'=>'username must be at least 3 characters.',
      'user.max'=>'user must be less than 50 characters.',
      'password.requird'=>'password is required',
      'password.min'=>'pasword must be at least 8 characters.',


     ];

    }
}

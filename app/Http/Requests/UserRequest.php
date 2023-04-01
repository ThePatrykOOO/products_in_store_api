<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $emailRules = ['required', 'string', 'email', 'max:255'];
        if (request()->method() == 'PUT') {
            $emailRules[] = Rule::unique('users')->ignore($this->user);
        }
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => $emailRules,
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}

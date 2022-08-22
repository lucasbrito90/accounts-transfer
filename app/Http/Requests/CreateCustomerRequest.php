<?php

namespace App\Http\Requests;

use App\Rules\TypesCustomersRules;
use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'document' => 'required|string|max:255|unique:customers',
            'type' => ['required', 'string', 'max:255', new TypesCustomersRules()],
            'password' => 'required|string|min:6',
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => 'Please enter a firstname',
            'firstname.string' => 'Please enter a valid firstname',
            'firstname.max' => 'Please enter a valid firstname',
            'lastname.required' => 'Please enter a lastname',
            'lastname.string' => 'Please enter a valid lastname',
            'lastname.max' => 'Please enter a valid lastname',
            'email.required' => 'Please enter an email',
            'email.string' => 'Please enter a valid email',
            'email.email' => 'Please enter a valid email',
            'email.max' => 'Please enter a valid email',
            'email.unique' => 'This email is already registered',
            'document.required' => 'Please enter a document',
            'document.string' => 'Please enter a valid document',
            'document.max' => 'Please enter a valid document',
            'document.unique' => 'This document is already registered',
            'type.required' => 'Please enter a type',
            'type.string' => 'Please enter a valid type',
            'type.max' => 'Please enter a valid type',
            'password.required' => 'Please enter a password',
            'password.string' => 'Please enter a valid password',
            'password.min' => 'Please enter a valid password',
        ];
    }
}

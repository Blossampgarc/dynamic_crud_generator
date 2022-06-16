<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AllRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        return [
            'username' => 'required',
            'name' => 'required|min:3',
           'email' => 'required|email|unique',
           'text' => 'required|text',
           'string' => 'required',
           'integer' => 'required|integer|max:11',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'email.email' => 'Incorrect format, Must add @ & .com',
            'email.unique' => 'This email already exist',
            'integer.required' => 'This field cannot be empty',
            'integer.integer' => 'Incorrect format, Can only contain numbers 0-9',
        ];
    }
}


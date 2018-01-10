<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ];
    }

    // public function messages()
    // {
    //     return response()->json([
    //         'name.required'     => 'Name Dilang Kosong',
    //         'email.required'    => 'Email Harus Valid',
    //         'email.required'    => 'Email Sudah Ada',
    //         'password.required' => 'Password Min 6',
    //     ], 401);
    // }
}

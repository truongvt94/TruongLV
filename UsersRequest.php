<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'email_verified_at' => 'required|same:email',
            'phone_number' => 'required|numeric',
            'year' => 'required',
            'password' => 'required',
            'password_verified_at' => 'required|same:password',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name is not empty',
            'email.required' => 'Email is not empty',
            'email.required' => 'Email is identical',
            'email_verified_at' => 'email_verified_at is not empty',
            'phone_number.required' => 'Phone is not empty',
            'phone_number.numeric' => 'The phone number must be a number',
            'year.required' => 'year_month_date not found',
            'password.required' => 'password is not empty',
            'password_verified_at.required' => 'password_verified_at is not empty'
        ];
    }
}

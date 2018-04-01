<?php

namespace HEGO\Auth\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name'     => 'required|string|max:191',
            'email'    => ['required|string', 'email', 'max:191', Rule::unique('users')],
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'      => __('core::validation.required'),
            'name.min'           => __('core::validation.min.string'),
            'email.required'     => __('core::validation.required'),
            'email.max'          => __('core::validation.max.string'),
            'email.unique'       => __('core::validation.unique'),
            'email.email'        => __('core::validation.email'),
            'password.required'  => __('core::validation.required'),
            'password.min'       => __('core::validation.min.string'),
            'password.confirmed' => __('core::validation.confirmed')
        ];
    }
}
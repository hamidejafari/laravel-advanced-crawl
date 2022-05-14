<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'mobile' => ['required', 'string'],
            'password' => ['required', 'string'],
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'mobile.required' => 'شماره موبایل اجباری است',
            'password.required' => 'رمز عبور اجباری است',
            'g-recaptcha-response.required' => 'کپچا اجباری است',
            'g-recaptcha-response.captcha' => 'کپچا درست وارد نشده است',
        ];
    }
}

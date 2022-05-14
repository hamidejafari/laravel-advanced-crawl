<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
            'name' => ['required', 'string', 'max:191'],
            'family' => ['required', 'string', 'max:191'],
            'mobile' => ['required', 'string',  Rule::unique('users')],
                        // 'mobile' => ['required', 'string', 'max:11', Rule::unique('users')],
            'email' => ['required', Rule::unique('users')],
            'g-recaptcha-response' => 'required|captcha'

        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '🔴 نام اجباری است',
            'family.required' => '🔴 نام خانوادگی اجباری است',
            'mobile.unique' => 'شماره همراه تکراری میباشد',
            'mobile.required' => '🔴 شماره همراه اجباری است',
            'g-recaptcha-response.required' => '🔴 کپچا اجباری است',
            'password.captcha' => '🔴 کپچا درست وارد نشده است',
            'email.required' => 'ایمیل اجباری است',
            'email.unique' => 'ایمیل تکراری است',
        ];
    }
}

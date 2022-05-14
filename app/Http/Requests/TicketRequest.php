<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'content' => ['required', 'min:3'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'content.required' => 'وارد کردن پیام اجباری است',
            'content.min' => 'پیام شما باید بالای ۳ حرف باشد',
        ];
    }
}

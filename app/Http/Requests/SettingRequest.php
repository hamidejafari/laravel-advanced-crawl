<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => 'required',
            'abouttitle' => 'required',
            'aboutus' => 'required',
            'rules' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'phone2' => 'required',
            'about1' => 'required',
            'title_seo' => 'required',
            'description_seo' => 'required',
            'image_seo' => 'required',
        ];
    }
}

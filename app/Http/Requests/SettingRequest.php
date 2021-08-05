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
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'title' => 'required|min:5|max:255',
             'favicon' => 'required',
             'logo' => 'required',
             'email' => 'required|email',
             'phone' => 'required',
             'address' => 'required|min:5|max:255',
             'location' => 'nullable|min:5|max:255',
             'description' => 'nullable|min:5|max:100000',
             'background_color' => 'nullable',
             'text_color' => 'nullable',
             'active' => 'required|boolean',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}

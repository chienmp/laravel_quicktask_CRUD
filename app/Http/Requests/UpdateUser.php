<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name' => 'required|alpha',
            'email' => 'required|unique:users|max:255',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => trans('required'),
            'name.alpha' => trans('alpha'),
            'email.required' => trans('required'),
            'email.unique' => trans('unique'),
            'email.max' => trans('max'),
        ];
    }
}

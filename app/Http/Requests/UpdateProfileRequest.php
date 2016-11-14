<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Auth;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guest() ? false : true) == return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:1|max:255',
            'last_name' => 'required|min:1|max:255',
            'current_pw' => 'required|min:6|max:255',
            'new_password' => 'min:6|confirmed|max:255'
        ];
    }
}
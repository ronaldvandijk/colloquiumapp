<?php
/**
 * UserRequest
 *
 * @author       Jamie Schouten
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
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
        $base = [
            'first_name' => 'required|min:1|max:255',
            'last_name' => 'required|min:1|max:255',
            'insertion' => 'min:1|max:255',
            'role_id' => 'required|exists:roles,id',
        ];

        switch ($this->method()) {
            case "PATCH":
                return $base + ['email' => 'required|unique:users,email,' . $this->user->id . '|email|min:1|max:255|'];
            case "POST":
                return $base + ['email' => 'required|unique:users|email|min:1|max:255|'];
            default:
                return [];
        }

    }
}

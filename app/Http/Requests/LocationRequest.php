<?php
/**
 * LocationRequest
 *
 * @author       Maarten Oosting
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LocationRequest
 * @package App\Http\Requests
 */
class LocationRequest extends FormRequest
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
            'name' => 'required|unique:locations',
            'city_id' => 'required|numeric',
        ];
    }
}

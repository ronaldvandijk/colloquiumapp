<?php
/**
 * RequestColloquiaRequest
 *
 * @author       Sander van Kasteel
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

/**
 * Class RequestColloquiaRequest
 * @package App\Http\Requests
 */
class RequestColloquiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('user|planner|administrator');
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
            'description' => 'required',
            'type_id' => 'required:number',
            'language_id' => 'required:number'
        ];
    }
}

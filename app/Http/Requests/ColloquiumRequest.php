<?php
/**
 * ColloquiumRequest.php
 *
 * @author       Sander van Kasteel <info@sandervankasteel.nl>
 */

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ColloquiumRequest
 * @package App\Http\Requests
 */
class ColloquiumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->colloquium->isOwner(Auth::user())) ? true : abort(403);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case "GET":
                return [];
            case "POST":
                return [];
            default:
                return [];
        }
    }
}

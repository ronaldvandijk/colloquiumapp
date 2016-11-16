<?php
/**
 * BuildingRequest
 *
 * @author       Rens Santing
 * @author       Jamie Schouten
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BuildingRequest
 * @package App\Http\Requests
 */
class BuildingRequest extends FormRequest
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
        switch ($this->method()) {
            case "PATCH":
                {
                    return [
                        'name' => 'required|unique:buildings,name,' . $this->building,
                        'abbreviation' => 'required|unique:buildings,abbreviation,' . $this->building,
                        'location_id' => 'required|integer|exists:locations,id',
                    ];
                }
            case "POST":
                {
                    return [
                        'name' => 'required|unique:buildings,name',
                        'abbreviation' => 'required|unique:buildings,abbreviation',
                        'location_id' => 'required|integer|exists:locations,id',
                    ];
                }

        }
        return [];
    }
}

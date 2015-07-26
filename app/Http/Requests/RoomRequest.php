<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class RoomRequest extends Request {

    /**
     * Determine if the room is authorized to make this request.
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
            'name'        => 'required|min:2|max:100',
            'description' => '',
            'types_beds'  => 'required|min:2|max:100',
            'total_beds'  => 'required|integer|min:1|max:256',
            'price'       => 'required|between:0,9999999999.99',
            'location'    => 'required|min:2|max:150',
            'plan'        => '',
        ];
    }

}

<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class ReservationRequest extends Request {

    /**
     * Determine if the reservation is authorized to make this request.
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
            'owner_id'=>'',
            'description'=>'',
            'total_price'=>'required|between:0,9999999999.99',
            'sign'=>'required|between:0,9999999999.99',
            'due'=>'required|between:0,9999999999.99',
            'check_in'=>'required|date',
            'check_out'=>'required|date',
        ];
    }

}

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
            'owner_id'    => '',
            'description' => '',
            'total_price' => 'required|between:0,9999999999.99',
            'sign'        => 'required|between:0,9999999999.99',
            'due'         => 'required|between:0,9999999999.99',
            'check_in'    => 'required|date',
            'check_out'   => 'required|date'
        ];
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->after(function() use ($validator) {
            if($validator->getData()['sign'] > $validator->getData()['total_price'])
                $validator->errors()->add('sign', 'La seña debe ser menor al precio total.');
            if($validator->getData()['check_out'] < $validator->getData()['check_in'])
                $validator->errors()->add('sign', 'La fecha de salida debe ser posterior a la de entrada.');
        });

        return $validator;
    }


}

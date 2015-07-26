<?php namespace FerEmma\Http\Requests;

//use FerEmma\Http\Requests\Request;

//use FerEmma\Rooms;

use \Illuminate\Support\Facades\DB;

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
            'owner_id'    => 'required',
            'description' => '',
            'total_price' => 'required|between:0,9999999999.99',
            'sign'        => 'required|between:0,9999999999.99',
            'due'         => 'required|between:0,9999999999.99',
            'check_in'    => 'required|date',
            'check_out'   => 'required|date',
            'rooms_id'    => 'required',
        ];
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->after(function() use ($validator) {
            if($validator->getData()['sign'] > $validator->getData()['total_price'])
                $validator->errors()->add('sign', 'La Seña debe ser menor al precio total.');

            if($validator->getData()['check_out'] < $validator->getData()['check_in'])
                $validator->errors()->add('sign', 'La Fecha de Salida debe ser posterior a la de entrada.');

            $rooms_id = ($validator->getData()['rooms_id'] ? array_map('intval', explode(',', $validator->getData()['rooms_id'])) : []);
            $persons_id = ($validator->getData()['persons_id'] ? array_map('intval', explode(',', $validator->getData()['persons_id'])) : []);
            $owner_id = $validator->getData()['owner_id'];

            $rooms = DB::table('rooms')->whereIn('id', $rooms_id)->get();
            $total_beds = 0;
            $total_persons = ($owner_id ? 1 : 0) + count($persons_id);

            foreach($rooms as $room)
                $total_beds += $room->total_beds;
            if($total_beds < $total_persons)
                $validator->errors()->add('persons_id', 'Hay demasiada cantidad de Personas ('.$total_persons.') en relación a la cantidad de Plazas ('.$total_beds.').');

        });

        return $validator;
    }

    public function messages()
    {
        return [
            'owner_id.required'     => 'El Propietario es requerido.',

            'total_price.required'  => 'El Precio es requerido.',
            'total_price.between'   => 'El Precio debe ser mayor a 0 y menor a 9999999999.',

            'sign.required'         => 'El Seña es requerida.',
            'sign.between'          => 'El Seña debe ser mayor a 0 y menor a 9999999999.',

            'check_in.required'     => 'La Fecha de Ingreso es requerida.',
            'check_in.date'         => 'El campo Fecha de Ingreso debe ser una fecha válida.',

            'check_out.required'    => 'La Fecha de Salida es requerida.',
            'check_out.date'        => 'El campo Fecha de Salida debe ser una fecha válida.',

            'rooms_id.required'     => 'El Propietario es requerido.',
        ];
    }


}

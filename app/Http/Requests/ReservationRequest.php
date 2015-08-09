<?php namespace FerEmma\Http\Requests;

use FerEmma\Distribution;
use FerEmma\Room;
use FerEmma\User;

//! Solicitud (Request) para una Reserva (Reservation)
class ReservationRequest extends Request {

    /// Determina si una Reserva (Reservation) esta autorizada para realizar la Solicitud (Request).
    /*!
     * @return Booleano (Verdadero o Falso)
     */
    public function authorize() {
        return true;
    }

    /// Reglas para la Solicitud (Request) de una Reserva (Reservation).
    /*!
     * @return Array
     */
    public function rules() {
        return [
            'owner'       => 'required',
            'owner_id'    => 'required|exists:users,id',
            'description' => '',
            'total_price' => 'required|between:0,9999999999.99',
            'sign'        => 'required|between:0,9999999999.99',
            'due'         => 'required|between:0,9999999999.99',
            'check_in'    => 'required|date',
            'check_out'   => 'required|date',
            'rooms_id'    => 'required',
        ];
    }

    /// Mensajes para cada regla de la Solicitud (Request) de una Reserva (Reservation).
    /*!
     * @return Array
     */
    public function messages() {
        return [
            'owner.required'        => 'El Propietario es requerido.',

            'owner_id.required'     => 'El Propietario es requerido.',
            'owner_id.exists'       => 'El Propietario debe ser un Usuario Válido.',

            'total_price.required'  => 'El Precio es requerido.',
            'total_price.between'   => 'El Precio debe ser mayor a 0 y menor a 9999999999.',

            'sign.required'         => 'El Seña es requerida.',
            'sign.between'          => 'El Seña debe ser mayor a 0 y menor a 9999999999.',

            'check_in.required'     => 'La Fecha de Ingreso es requerida.',
            'check_in.date'         => 'El campo Fecha de Ingreso debe ser una fecha válida.',

            'check_out.required'    => 'La Fecha de Salida es requerida.',
            'check_out.date'        => 'El campo Fecha de Salida debe ser una fecha válida.',

            'rooms_id.required'     => 'No hay Habitaciones ingresadas.',
        ];
    }

    /// Realiza el control de las reglas de negocio.
    /*!
     * @return $validator
     */
    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->after(function() use ($validator) {
            if($validator->getData()['sign'] > $validator->getData()['total_price'])
                $validator->errors()->add('sign', 'La Seña debe ser menor al precio total.');

            if($validator->getData()['check_out'] < $validator->getData()['check_in'])
                $validator->errors()->add('sign', 'La Fecha de Salida debe ser posterior a la de entrada.');

            $owner_id = $validator->getData()['owner_id'];

            $persons_id = ($validator->getData()['persons_id'] ? array_map('intval', explode(',', $validator->getData()['persons_id'])) : []);
            if(!User::checkValidUsers($persons_id))
                $validator->errors()->add('persons_id', 'Los Pasajeros deben ser Usuarios Válidos.');

            $total_persons = ($owner_id ? 1 : 0) + count($persons_id);
            $total_beds = 0;
            $distributions_id = [];
            $distributions = [];

            $rooms_id = ($validator->getData()['rooms_id'] ? array_map('intval', explode(',', $validator->getData()['rooms_id'])) : []);
            foreach ($rooms_id as $id) {
                if(!$room = Room::find($id))
                    $validator->errors()->add('rooms_id', 'Las Habitaciones deben ser Válidas.');
                else {
                    $distribution_id = $validator->getData()['room-'.$id.'-distributions'];
                    $distributions_id[] = $distribution_id;
                    if(!$room->hasThisDistributionId($distribution_id)) {
                        $validator->errors()->add('rooms_id', 'Las Habitaciones deben tener Distribuciones Válidas para dicha Habitación.');
                    }
                }
            }

            $distributions = Distribution::whereIn('id', $distributions_id)->get();
            $distributions_id = array_count_values($distributions_id);

            foreach ($distributions as $distribution)
                $total_beds += $distribution->totalPersons() * $distributions_id[$distribution->id];

            if($total_beds < $total_persons)
                $validator->errors()->add('persons_id', 'Hay demasiada cantidad de Personas ('.$total_persons.') en relación a la cantidad de Plazas ('.$total_beds.').');

        });

        return $validator;
    }

}

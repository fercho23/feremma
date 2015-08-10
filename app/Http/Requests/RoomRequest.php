<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;
use FerEmma\Room;
use FerEmma\Distribution;

//! Solicitud (Request) para una Habitación (Room)
class RoomRequest extends Request {

    /// Determina si una Habitación (Room) esta autorizada para realizar la Solicitud (Request).
    /*!
     * @return Booleano (Verdadero o Falso)
     */
    public function authorize() {
        return true;
    }

    /// Reglas para la Solicitud (Request) de una Habitación (Room).
    /*!
     * @return Array
     */
    public function rules() {
        return [
            'name'             => 'required|min:2|max:100',
            'description'      => '',
            'location'         => 'required|min:2|max:150',
            'available'        => '',
            'price'            => 'required|between:0,9999999999.99',
            'distributions_id' => 'required',
        ];
    }

    /// Mensajes para cada regla de la Solicitud (Request) de una Habitación (Room).
    /*!
     * @return Array
     */
    public function messages() {
        return [
            'name.required'             => 'El Nombre es requerido.',
            'name.min'                  => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'                  => 'El Nombre debe tener como máximo 100 caracteres.',

            'location.required'         => 'La Ubicación es requerida.',
            'location.min'              => 'La Ubicación debe tener como mínimo 2 caracteres.',
            'location.max'              => 'La Ubicación debe tener como máximo 150 caracteres.',

            'price.required'            => 'El Precio es requerido.',
            'price.between'             => 'El Precio debe ser mayor a 0 y menor a 9999999999.',

            'distributions_id.required' => 'Es necesario ingresar al menos 1 Distribución.',
        ];
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->after(function() use ($validator) {
            $distributions_id = ($validator->getData()['distributions_id'] ? array_map('intval', explode(',', $validator->getData()['distributions_id'])) : []);
            if(!Distribution::checkValidDistributions($distributions_id))
                $validator->errors()->add('distributions_id', 'Las Distribuciones deben ser Válidas.');
            $room = Room::find($this->rooms);
            if(!$room->allDistributionsIdCanBeEliminated($distributions_id))
                $validator->errors()->add('distributions_id', 'Las Distribuciones que intenta borrar no pueden ser eliminadas.');
        });

        return $validator;
    }

}

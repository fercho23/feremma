<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\BasicRequest;
use FerEmma\Room;
use FerEmma\Distribution;

//! Solicitud (Request) para una Habitación (Room)
class RoomRequest extends BasicRequest {

    /// Reglas para la Solicitud (Request) de una Habitación (Room).
    /*!
     * @return Array
     */
    public function rules() {
        $rules = [
            'location'         => 'required|min:2|max:150',
            'available'        => '',
            'distributions_id' => 'required',
        ];
        return array_merge(parent::rules(), $rules);
    }

    /// Mensajes para cada regla de la Solicitud (Request) de una Habitación (Room).
    /*!
     * @return Array
     */
    public function messages() {
        $messages = [
            'location.required'         => 'La Ubicación es requerida.',
            'location.min'              => 'La Ubicación debe tener como mínimo 2 caracteres.',
            'location.max'              => 'La Ubicación debe tener como máximo 150 caracteres.',

            'distributions_id.required' => 'Es necesario ingresar al menos 1 Distribución.',
        ];
        return array_merge(parent::messages() , $messages);
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

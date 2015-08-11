<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\BasicRequest;

//! Solicitud (Request) para una Cama (Bed)
class BedRequest extends BasicRequest {

    /// Reglas para la Solicitud (Request) de una Cama (Bed).
    /*!
     * @return Array
     */
    public function rules() {
        // $rules = parent::rules();
        $rules = [
            'total_persons' => 'required|integer|min:1|max:10',
        ];
        return array_merge(parent::rules(), $rules);
    }


    /// Mensajes para cada regla de la Solicitud (Request) de una Cama (Bed).
    /*!
     * @return Array
     */
    public function messages() {
        // $messages = parent::messages();
        $messages = [
            'total_persons.required' => 'Total Personas es requerido.',
            'total_persons.integer'  => 'Total Personas debe ser un número entero.',
            'total_persons.min'      => 'Total Personas debe ser como mínimo 1.',
            'total_persons.max'      => 'Total Personas debe ser como máximo 10.',
        ];
        return array_merge(parent::messages() , $messages);
    }

}
<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\BasicRequest;

//! Solicitud (Request) para una Cama (Bed)
class BedBasicRequest extends BasicRequest {

    /// Reglas para la Solicitud (Request) de una Cama (Bed).
    /*!
     * @return Array
     */
    public function rules() {
        // $rules = parent::rules();
        $rules = [
            'price' => 'required|between:0,9999999999.99',
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
            'price.required' => 'El Precio es requerido.',
            'price.between'  => 'El Precio debe ser mayor a 0 y menor a 9999999999.',
        ];
        return array_merge(parent::messages() , $messages);
    }

}
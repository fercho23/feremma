<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\BasicRequest;

//! Solicitud (Request) para un Servicio (Service)
class ServiceRequest extends BasicRequest {


    /// Determina las reglas para la Solicitud (Request) de un Servicio (Service).
    /*!
     * @return Array
     */
    public function rules() {
        $rules = [
            'price' => 'required|between:0,9999999999.99',
        ];
        return array_merge(parent::rules(), $rules);
    }

    /// Mensajes para cada regla de la Solicitud (Request) de un Servicio (Service).
    /*!
     * @return Array
     */
    public function messages() {
        $messages = [
            'price.required' => 'El Precio es requerido.',
            'price.between'  => 'El Precio debe ser mayor a 0 y menor a 9999999999.',
        ];
        return array_merge(parent::messages() , $messages);
    }

}

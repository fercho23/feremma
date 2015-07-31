<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

//! Solicitud (Request) para un Servicio (Service)
class ServiceRequest extends Request {

    /// Determina si un Servicio (Service) esta autorizada para realizar la Solicitud (Request).
    /*!
     * @return Booleano (Verdadero o Falso)
     */
    public function authorize() {
        return true;
    }

    /// Determina las reglas para la Solicitud (Request) de un Servicio (Service).
    /*!
     * @return Array
     */
    public function rules() {
        return [
            'name'        => 'required|min:2|max:100',
            'description' => '',
            'price'       => 'required|between:0,9999999999.99',
        ];
    }

    /// Mensajes para cada regla de la Solicitud (Request) de un Servicio (Service).
    /*!
     * @return Array
     */
    public function messages() {
        return [
            'name.required'  => 'El Nombre es requerido.',
            'name.min'       => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'       => 'El Nombre debe tener como máximo 2 caracteres.',

            'price.required' => 'El Precio es requerido.',
            'price.between'  => 'El Precio debe ser mayor a 0 y menor a 9999999999.',
        ];
    }

}

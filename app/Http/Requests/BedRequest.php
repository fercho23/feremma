<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

//! Solicitud (Request) para una Cama (Bed)
class BedRequest extends Request {

    /// Determina si una Cama (Bed) esta autorizada para realizar la Solicitud (Request).
    /*!
     * @return Booleano (Verdadero o Falso)
     */
    public function authorize() {
        return true;
    }

    /// Reglas para la Solicitud (Request) de una Cama (Bed).
    /*!
     * @return Array
     */
    public function rules() {
        return [
            'name'          => 'required|min:2|max:100',
            'description'   => '',
            'total_persons' => 'required|integer|min:1|max:10',
            'price'         => 'required|between:0,9999999999.99',
        ];
    }

    /// Mensajes para cada regla de la Solicitud (Request) de una Cama (Bed).
    /*!
     * @return Array
     */
    public function messages() {
        return [
            'name.required'          => 'El Nombre es requerido.',
            'name.min'               => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'               => 'El Nombre debe tener como máximo 100 caracteres.',

            'total_persons.required' => 'Total Personas es requerido.',
            'total_persons.integer'  => 'Total Personas debe ser un número entero.',
            'total_persons.min'      => 'Total Personas debe ser como mínimo 1.',
            'total_persons.max'      => 'Total Personas debe ser como máximo 10.',

            'price.required'         => 'El Precio es requerido.',
            'price.between'          => 'El Precio debe ser mayor a 0 y menor a 9999999999.',
        ];
    }

}
<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

//! Solicitud (Request) para un Cargo (Role)
class RoleRequest extends Request {

    /// Determina si un Cargo (Role) esta autorizado para realizar la Solicitud (Request).
    /*!
     * @return Booleano (Verdadero o Falso)
     */
    public function authorize() {
        return true;
    }

    /// Reglas para la Solicitud (Request) de un Cargo (Role).
    /*!
     * @return Array
     */
    public function rules()
    {
        return [
            'name'        => 'required|min:2|max:100',
            'description' => '',
        ];
    }

    /// Mensajes para cada regla de la Solicitud (Request) de un Cargo (Role).
    /*!
     * @return Array
     */
    public function messages()
    {
        return [
            'name.required' => 'El Nombre es requerido.',
            'name.min'      => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'      => 'El Nombre debe tener como máximo 100 caracteres.',
        ];
    }

}

<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

//! Solicitud (Request) para una Tarea (Task)
class TaskRequest extends Request {

    /// Determina si una Tarea (Task) esta autorizada para realizar la Solicitud (Request).
    /*!
     * @return Booleano (Verdadero o Falso)
     */
    public function authorize() {
        return true;
    }

    /// Determina las reglas para la Solicitud (Request) de una Tarea (Task).
    /*!
     * @return Array
     */
    public function rules() {
        return [
            'name'        => 'required|min:2|max:100',
            'description' => '',
            'priority'    => 'required|integer|min:1|max:10',
            'state'       => 'required|min:1|max:20',
        ];
    }

    /// Mensajes para cada regla de la Solicitud (Request) de una Tarea (Task).
    /*!
     * @return Array
     */
    public function messages() {
        return [
            'name.required'    => 'El Nombre es requerido.',
            'name.min'         => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'         => 'El Nombre debe tener como máximo 100 caracteres.',

            'priority.required' => 'La Prioridad es requerida.',
            'priority.integer'  => 'La Prioridad debe ser un número entero.',
            'priority.min'      => 'La Prioridad debe ser como mínimo 1.',
            'priority.max'      => 'La Prioridad debe ser como máximo 256 caracteres.',

            'state.required'    => 'El Nombre es requerido.',
            'state.min'         => 'El Nombre debe tener como mínimo 2 caracteres.',
            'state.max'         => 'El Nombre debe tener como máximo 2 caracteres.',

        ];
    }

}

<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\BasicRequest;

//! Solicitud (Request) para una Tarea (Task)
class TaskRequest extends BasicRequest {

    /// Determina las reglas para la Solicitud (Request) de una Tarea (Task).
    /*!
     * @return Array
     */
    public function rules() {
        $rules = [
            'role_id'     => 'required|exists:roles,id|not_in:1',
            'priority'    => 'required|integer|min:1|max:10',
            'state'       => 'required|min:1|max:20',
        ];
        return array_merge(parent::rules(), $rules);
    }

    /// Mensajes para cada regla de la Solicitud (Request) de una Tarea (Task).
    /*!
     * @return Array
     */
    public function messages() {
        $messages = [
            'role_id.required'  => 'El Cargo es requerido.',
            'role_id.exists'    => 'El Cargo debe ser Válido.',
            'role_id.not_in'    => 'El Cargo debe ser Válido.',

            'priority.required' => 'La Prioridad es requerida.',
            'priority.integer'  => 'La Prioridad debe ser un número entero.',
            'priority.min'      => 'La Prioridad debe ser como mínimo 1.',
            'priority.max'      => 'La Prioridad debe ser como máximo 10.',

            'state.required'    => 'El Nombre es requerido.',
            'state.min'         => 'El Nombre debe tener como mínimo 2 caracteres.',
            'state.max'         => 'El Nombre debe tener como máximo 2 caracteres.',
        ];
        return array_merge(parent::messages() , $messages);
    }

}

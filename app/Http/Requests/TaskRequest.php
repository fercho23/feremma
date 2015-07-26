<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class TaskRequest extends Request {

    /**
     * Determine if the task is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|min:2|max:100',
            'description' => '',
            'priority'    => 'required|integer|min:1|max:10',
            'state'       => 'required|min:1|max:20',
        ];
    }

    public function messages()
    {
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

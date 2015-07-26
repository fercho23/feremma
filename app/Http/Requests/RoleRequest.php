<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class RoleRequest extends Request {

    /**
     * Determine if the role is authorized to make this request.
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
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El Nombre es requerido.',
            'name.min'      => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'      => 'El Nombre debe tener como máximo 100 caracteres.',
        ];
    }

}

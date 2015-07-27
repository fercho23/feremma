<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class UserRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
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
            'username' => 'required|min:2|max:100',
            'name'     => 'required|min:2|max:150',
            'surname'  => 'required|min:2|max:150',
            'email'    => 'required|email|max:100',
            'dni'      => 'required',
            'address'  => 'required',
            'phone'    => 'required',
            'cuil'     => 'required',
            'birthday' => 'required|date',
            'password' => 'required',
            'sex'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'El Nombre de Usuario es requerido.',
            'username.min'      => 'El Nombre de Usuario debe tener como mínimo 2 caracteres.',
            'username.max'      => 'El Nombre de Usuario debe tener como máximo 100 caracteres.',

            'name.required'     => 'El Nombre es requerido.',
            'name.min'          => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'          => 'El Nombre debe tener como máximo 150 caracteres.',

            'surname.required'  => 'El Apellido es requerido.',
            'surname.min'       => 'El Apellido debe tener como mínimo 2 caracteres.',
            'surname.max'       => 'El Apellido debe tener como máximo 150 caracteres.',

            'dni.required'      => 'El DNI es requerido.',

            'address.required'  => 'La Dirección es requerida.',

            'phone.required'    => 'El Teléfono es requerido.',

            'cuil.required'     => 'El CUIL es requerido.',

            'birthday.required' => 'La Fecha de Nacimiento es requerida.',
            'check_in.date'     => 'La Fecha de Nacimiento debe ser una fecha válida.',

            'password.required' => 'El Password es requerido.',

            'sex.required'      => 'El Sexo es requerido.',
        ];
    }

}

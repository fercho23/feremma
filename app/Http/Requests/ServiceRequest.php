<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class ServiceRequest extends Request {

    /**
     * Determine if the service is authorized to make this request.
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
            'price'       => 'required|between:0,9999999999.99',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'El Nombre es requerido.',
            'name.min'       => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'       => 'El Nombre debe tener como máximo 2 caracteres.',

            'price.required' => 'El Precio es requerido.',
            'price.between'  => 'El Precio debe ser mayor a 0 y menor a 9999999999.',
        ];
    }

}

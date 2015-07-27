<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\Request;

class RoomRequest extends Request {

    /**
     * Determine if the room is authorized to make this request.
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
            'types_beds'  => 'required|min:2|max:100',
            'total_beds'  => 'required|integer|min:1|max:256',
            'price'       => 'required|between:0,9999999999.99',
            'location'    => 'required|min:2|max:150',
            'plan'        => '',
        ];
    }

    public function messages()
    {
        return [
            'name.required'       => 'El Nombre es requerido.',
            'name.min'            => 'El Nombre debe tener como mínimo 2 caracteres.',
            'name.max'            => 'El Nombre debe tener como máximo 100 caracteres.',

            'types_beds.required' => 'Tipos de Camas es requerido.',
            'types_beds.min'      => 'Tipos de Camas debe tener como mínimo 2 caracteres.',
            'types_beds.max'      => 'Tipos de Camas debe tener como máximo 100 caracteres.',

            'total_beds.required' => 'Total Plazas es requerido.',
            'total_beds.integer'  => 'Total Plazas debe ser un número entero.',
            'total_beds.min'      => 'Total Plazas debe ser como mínimo 1.',
            'total_beds.max'      => 'Total Plazas debe ser como máximo 256 caracteres.',

            'price.required'      => 'El Precio es requerido.',
            'price.between'       => 'El Precio debe ser mayor a 0 y menor a 9999999999.',

            'location.required'   => 'La Ubicación es requerida.',
            'location.min'        => 'La Ubicación debe tener como mínimo 2 caracteres.',
            'location.max'        => 'La Ubicación debe tener como máximo 150 caracteres.',
        ];
    }

}

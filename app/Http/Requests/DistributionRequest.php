<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\BasicRequest;
use FerEmma\Bed;

//! Solicitud (Request) para una Distribución (Distribution)
class DistributionRequest extends BasicRequest {


    /// Reglas para la Solicitud (Request) de una Distribución (Distribution).
    /*!
     * @return Array
     */
    public function rules() {
        // $rules = parent::rules();
        $rules = [
            'beds_id' => 'required',
        ];
        return array_merge(parent::rules(), $rules);
    }

    /// Mensajes para cada regla de la Solicitud (Request) de una Distribución (Distribution).
    /*!
     * @return Array
     */
    public function messages() {
        // $messages = parent::messages();
        $messages = [
            'beds_id.required' => 'Es necesario ingresar al menos 1 Cama.'
        ];
        return array_merge(parent::messages() , $messages);
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->after(function() use ($validator) {
            $beds_id = ($validator->getData()['beds_id'] ? array_map('intval', explode(',', $validator->getData()['beds_id'])) : []);
            if(!Bed::checkValidBeds($beds_id))
                $validator->errors()->add('beds_id', 'Las Camas deben ser Válidas.');
        });

        return $validator;
    }

}
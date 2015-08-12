<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\BasicRequest;

//! Solicitud (Request) para Reportes (Report)
class ReportRequest extends Request {

    /// Determina si esta autorizada para realizar la Solicitud (Request).
    /*!
     * @return Booleano (Verdadero o Falso)
     */
    public function authorize() {
        return true;
    }

    /// Determina las reglas para la Solicitud.
    /*!
     * @return Array
     */
    public function rules() {
        $rules = [
            'firstDate' => 'required',
            'reportName' => 'required',
            'secondDate' => 'required'
        ];
        return $rules;
    }

    /// Mensajes para cada regla de la Solicitud (Request) de un Servicio (Service).
    /*!
     * @return Array
     */
    public function messages() {
        $messages = [
            'firstDate.required' => 'La primer fecha es requerida.',
            'secondDate.required'  => 'La segunda fecha es requerida.',
            'reportName.required'  => 'La El nombre del reporte es requerido.',

        ];
        return $messages;
    }

}

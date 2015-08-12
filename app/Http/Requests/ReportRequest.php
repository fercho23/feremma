<?php namespace FerEmma\Http\Requests;

use FerEmma\Http\Requests\BasicRequest;

//! Solicitud (Request) para Reportes (Report)
class ReportRequest extends BasicRequest {


    /// Determina las reglas para la Solicitud.
    /*!
     * @return Array
     */
    public function rules() {
        dd("hola");
    }

    /// Mensajes para cada regla de la Solicitud (Request) de un Servicio (Service).
    /*!
     * @return Array
     */
    public function messages() {
        
    }

}

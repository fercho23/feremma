<?php namespace FerEmma\Http\Controllers;


//! Controlador de Reportes
class ReportsController extends Controller {

    /// Lista de Reportes.
    /*!
     * @return Vista con Reportes
     */
    public function index() {
        return view('reports.index');
    }


}

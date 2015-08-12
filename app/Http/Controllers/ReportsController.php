<?php namespace FerEmma\Http\Controllers;

use FerEmma\Report;
use FerEmma\Http\Requests\ReportRequest;

//! Controlador de Reportes
class ReportsController extends Controller {

    /// Lista de Reportes.
    /*!
     * @return Vista con Reportes
     */
    public function index() {
        return view('reports.index');
    }

    public function generate(ReportRequest $request) {
        $items=(new Report)->generateReport($request->all());
        return view('reports.generate', ['items'=>$items, 'request'=>$request->all()]);
    }
}
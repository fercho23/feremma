<?php namespace FerEmma\Http\Controllers;

use FerEmma\Report;
use FerEmma\Room;
use FerEmma\Http\Requests\ReportRequest;

//! Controlador de Reportes
class ReportsController extends Controller {

    /// Lista de Reportes.
    /*!
     * @return Vista con Reportes
     */
    public function index() {
        $datas = Room::all();
        $rooms = array();

        foreach ($datas as $data) {
            $rooms[$data->id] = $data->name;
        }

        return view('reports.index', compact('rooms'));
    }

    public function generate(ReportRequest $request) {
        $items=(new Report)->generateReport($request->all());
        if ($request->all()['reporttype']=='nextReservationsDue' || $request->all()['reporttype']=='nextReservationsDueBetweenDates') {
            return view('reports.generate-totals', ['items'=>$items, 'request'=>$request->all()]);
        }        
        return view('reports.generate', ['items'=>$items, 'request'=>$request->all()]);
    }
}


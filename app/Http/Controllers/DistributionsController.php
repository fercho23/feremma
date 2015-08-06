<?php namespace FerEmma\Http\Controllers;

use FerEmma\Distribution;
use FerEmma\Http\Requests\DistributionRequest;

//! Controlador de Distribuciones (Distribution)
class DistributionsController extends Controller {

    /// Lista de Distribuciones (Distribution).
    /*!
     * @return Vista con Distribuciones (Distribution)
     */
    public function index() {
        $distributions = Distribution::all();
        return view('distributions.index', ['distributions'=>$distributions]);
    }

    /// Fomulario de nueva Distribución (Distribution).
    /*!
     * Muestra el formulario para ingresar una nueva Distribución,
     * esta función se llama con el método GET.
     * @return Vista con una Distribución (Distribution) vacía
     */
    public function create() {
        $distribution = new Distribution;
        return view('distributions.create', compact('distribution'));
    }

    /// Crea una Distribución (Distribution).
    /*!
     * Realiza el proceso de crear una nueva Distribución,
     * esta función se llama con el método POST.
     * @param DistributionRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(DistributionRequest $request) {
        $distribution = Distribution::create($request->all());

        $beds_id = ($request->input('beds_id') ? array_map('intval', explode(',', $request->input('beds_id'))) : []);

        $beds = [];
        foreach($beds_id as $id) {
            $bed = [];
            $bed["amount"] = $request->input('bed-amount-'.$id);
            $beds[$id] = $bed;
        }

        $distribution->beds()->sync($beds);

        flash()->success('La Distribución fue ingresada con exito.');
        return redirect('distributions');
    }

    /// Muestra una Distribución (Distribution) específica.
    /*!
     * Muestra específicamente una Distribución que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /// Fomulario de edición de una Distribución (Distribution) específica.
    /*!
     * Muestra el formulario para editar una Distribución que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $distribution = Distribution::findOrFail($id);
        return view('distributions.edit', compact('distribution'));
    }

    /// Edita una Distribución (Distribution) específica.
    /*!
     * Realiza el proceso de editar una Distribución que es buscada por su $id,
     * esta función se llama con el método PUT/PATH.
     * @param  int $id
     * @param  DistributionRequest $request
     * @return Response
     */
    public function update($id, DistributionRequest $request) {
        $distribution = Distribution::findOrFail($id);
        $distribution->update($request->all());

        $beds_id = ($request->input('beds_id') ? array_map('intval', explode(',', $request->input('beds_id'))) : []);

        $beds = [];
        foreach($beds_id as $id) {
            $bed = [];
            $bed["amount"] = $request->input('bed-amount-'.$id);
            $beds[$id] = $bed;
        }

        $distribution->beds()->sync($beds);

        flash()->success('La Distribución fue editada con exito.');
        return redirect('distributions');
    }

    /// Elimina una Distribución (Distribution) específica.
    /*!
     * Realiza el proceso de eliminar una Distribución que es buscada por su $id,
     * esta función se llama con el método DELETE.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $distribution = Distribution::findOrFail($id);
        $distribution->delete();
        //$distribution->permissions()->detach();
        flash()->success('La Distribución fue borrada con exito.');
        return redirect('distributions');
    }

}

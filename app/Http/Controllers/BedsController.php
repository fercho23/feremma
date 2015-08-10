<?php namespace FerEmma\Http\Controllers;

use FerEmma\Bed;
use FerEmma\Http\Requests\BedRequest;

//! Controlador de Camas (Bed)
class BedsController extends Controller {

    /// Lista de Camas (Bed).
    /*!
     * @return Vista con Camas (Bed)
     */
    public function index() {
        $beds = Bed::all();
        return view('beds.index', ['beds'=>$beds]);
    }

    /// Fomulario de nueva Cama (Bed).
    /*!
     * Muestra el formulario para ingresar una nueva Cama,
     * esta función se llama con el método GET.
     * @return Vista con una Cama (Bed) vacía
     */
    public function create() {
        return view('beds.create');
    }

    /// Crea una Cama (Bed).
    /*!
     * Realiza el proceso de crear una nueva Cama,
     * esta función se llama con el método POST.
     * @param BedRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(BedRequest $request) {
        Bed::create($request->all());
        flash()->success('La Cama fue ingresada con exito.');
        return redirect('beds');
    }

    /// Muestra una Cama (Bed) específica.
    /*!
     * Muestra específicamente una Cama que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /// Fomulario de edición de una Cama (Bed) específica.
    /*!
     * Muestra el formulario para editar una Cama que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $bed = Bed::findOrFail($id);
        return view('beds.edit', compact('bed'));
    }

    /// Edita una Cama (Bed) específica.
    /*!
     * Realiza el proceso de editar una Cama que es buscada por su $id,
     * esta función se llama con el método PUT/PATH.
     * @param  int $id
     * @param  BedRequest $request
     * @return Response
     */
    public function update($id, BedRequest $request) {
        $bed = Bed::findOrFail($id);
        $bed->update($request->all());
        flash()->success('La Cama fue editada con exito.');
        return redirect('beds');
    }

    /// Elimina una Cama (Bed) específica.
    /*!
     * Realiza el proceso de eliminar una Cama que es buscada por su $id,
     * esta función se llama con el método DELETE.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $bed = Bed::findOrFail($id);
        $bed->delete();
        return redirect('beds');
    }

}

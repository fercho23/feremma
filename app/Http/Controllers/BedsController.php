<?php namespace FerEmma\Http\Controllers;

use FerEmma\Bed;
use FerEmma\Http\Requests\BedRequest;
use FerEmma\Http\Requests\BedBasicRequest;

//! Controlador de Camas (Bed)
class BedsController extends Controller {

    /// Lista de Camas (Bed).
    /*!
     * @return Vista con Camas (Bed)
     */
    public function index() {
        $beds = Bed::paginate(15);
        return view('beds.index', ['beds'=>$beds]);
    }

    /// Fomulario de nueva Cama (Bed).
    /*!
     * Muestra el formulario para ingresar una nueva Cama,
     * esta función se llama con el método GET.
     * @return Vista con una Cama (Bed) vacía
     */
    public function create() {
        $bed=new Bed;
        return view('beds.create',compact('bed'));
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
        if($bed = Bed::find($id))
            return view('beds.show', compact('bed'));
        flash()->error('Error!!! La Cama que intenta ver no existe.');
        return redirect('beds');
    }

    /// Fomulario de edición de una Cama (Bed) específica.
    /*!
     * Muestra el formulario para editar una Cama que es buscada por su $id,
     * esta función se llama con el método GET.
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        if($bed = Bed::find($id))
            return view('beds.edit', compact('bed'));
        flash()->error('Error!!! La Cama que intenta editada no existe.');
        return redirect('beds');
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
        if($bed = Bed::find($id)) {
            $bed->update($request->all());
            flash()->success('La Cama fue editada con exito.');
        } else
            flash()->error('Error!!! La Cama que intenta editada no existe.');
        return redirect('beds');
    }

    /// Edita una Cama (Bed) específica sin las Camas (Bed).
    /*!
     * Realiza el proceso de editar una Cama que es buscada por su $id,
     * pero en la cual no se pueden modificar el total de personas,
     * esta función se llama con el método POST.
     * @param  int $id
     * @param  BedBasicRequest $request
     * @return Response
     */
    public function updateBasic($id, BedBasicRequest $request) {
        if($bed = Bed::find($id)) {
            $bed->update($request->all());
            flash()->success('La Cama fue editada con exito.');
        } else
            flash()->error('Error!!! La Cama que intenta editada no existe.');
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

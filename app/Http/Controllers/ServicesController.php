<?php namespace FerEmma\Http\Controllers;

use FerEmma\Service;
use FerEmma\Http\Requests\ServiceRequest;

//! Controlador de Servicios (Service)
class ServicesController extends Controller {

    /*! \brief Lista de Servicios (Service).
     *
     * @return Vista con Servicios (Service)
     */
    public function index() {
        $services = Service::all();
        return view('services.index', ['services'=>$services]);
    }

    /*! \brief Fomulario de nuevo Servicio (Service).
     *
     * Muestra el formulario para ingresar un nuevo Servicio esta función se
     * llama con el método GET.
     *
     * @return Vista con un Servicio (Service) vacío
     */
    public function create() {
        return view('services.create');
    }

    /*! \brief Crea un Servicio (Service).
     *
     * Realiza el proceso de crear un nuevo Servicio,
     * esta función se llama con el método POST.
     *
     * @param ServiceRequest $request
     * @return Vista "index" con el mensaje Flash pertinente
     */
    public function store(ServiceRequest $request) {
        Service::create($request->all());
        flash()->success('El Servicio fue ingresado con exito.');
        return redirect('services');
    }

    /*! \brief Muestra un Servicio (Service) específico.
     *
     * Muestra específicamente un Servicio que es buscado por su $id,
     * esta función se llama con el método GET.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /*! \brief Fomulario de edición de un Servicio (Service) específico.
     *
     * Muestra el formulario para editar un Servicio que es buscado por su $id,
     * esta función se llama con el método GET.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    /*! \brief Edita un Servicio (Service) específico.
     *
     * Realiza el proceso de editar un Servicio que es buscado por su $id,
     * esta función se llama con el método PUT/PATH.
     *
     * @param  int $id
     * @param  ServiceRequest $request
     * @return Response
     */
    public function update($id, ServiceRequest $request) {
        $service = Service::findOrFail($id);
        $service->update($request->all());
        flash()->success('El Servicio fue editado con exito.');
        return redirect('services');
    }

    /*! \brief Elimina un Servicio (Service) específico.
     *
     * Realiza el proceso de eliminar un Servicio que es buscado por su $id,
     * esta función se llama con el método DELETE.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $service = Service::findOrFail($id);
        $service->delete();
        flash()->success('El Servicio fue borrado con exito.');
        return redirect('services');
    }

}

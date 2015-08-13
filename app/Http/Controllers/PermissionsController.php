<?php namespace FerEmma\Http\Controllers;

use FerEmma\Role;
use FerEmma\Http\Controllers\Controller;

//! Controlador de Permisos (Permission)
class PermissionsController extends Controller {

    /// Lista de Permisos (Permission).
    /*!
     * @return Vista con Permisos (Permission)
     */
    public function index()
    {
        return view('permissions.index')->with('roles', Role::all());
    }


}

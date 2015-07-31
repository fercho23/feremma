<?php namespace FerEmma\Http\Controllers;

//! Controlador de Usuarios No Logueados (Controller)
class WelcomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /// Contructor de la clase.
    /*!
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /// Muestra la Vista (View) al Usuario (User).
    /*!
     * @return Response
     */
    public function index() {
        return view('welcome');
    }

}

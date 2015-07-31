<?php namespace FerEmma\Http\Controllers;

//! Controlador de Usuarios Logueados (Controller)
class HomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /// Contructor de la clase.
    /**
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /// Muestra la Vista (View) al Usuario (User).
    /**
     * @return Response
     */
    public function index() {
        return view('home');
    }

}

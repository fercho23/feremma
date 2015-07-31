<?php namespace FerEmma\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

//! Controlador (Controller)
abstract class Controller extends BaseController {

    use DispatchesCommands, ValidatesRequests;


}

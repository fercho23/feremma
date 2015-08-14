<?php namespace FerEmma\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\HttpResponse;


class CheckPermission implements Middleware {

    /// Maneja una petición.
    /*!
     * Maneja una petición.
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if($this->hasPermission($request)) {
            view()->share('currentUser', $request->user());
            return $next($request);
        }
        return redirect('home');
    }

    /// Verifica si el Usuario (User) tiene el Permisos (Permission) a la ruta requerida.
    /*!
     * @param  Request $request
     * @return Boolean true if has permission otherwise false
     */
    protected function hasPermission($request) {
        $required = $this->requiredPermission();
        return !$this->forbiddenRoute($request) && $request->user()->can($required);
    }

    /// Verifica la ruta con el Permiso (Permission).
    /*!
     * /param  Request  $request
     * /return String slug connected to the Route
     */
    protected function requiredPermission() {
        $route = \Route::currentRouteAction();
        if(isset($route)) {
            $route = class_basename($route);
            $route = explode("Controller@", $route, 2);

            if($route[1] == "store")
                $route[1] = "create";
            if($route[1] == "update")
                $route[1] = "edit";

            $action = strtolower($route[0]).'/'.$route[1];
        }

        return isset($action) ? $action : null;
    }

    /**
     * Check if current route is hidden to current user role
     *
     * /param  Request $request
     * /return Booleano (Verdadero o Flase)
     */
    protected function forbiddenRoute($request) {
        $action = $request->route()->getAction();

        if(isset($action['except'])) {

            return $action['except'] == $request->user()->role->slug;
        }

        return false;
    }
}
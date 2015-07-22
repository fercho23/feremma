<?php namespace FerEmma\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\HttpResponse;


class CheckPermission implements Middleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->userHasAccessTo($request)) {

            view()->share('currentUser', $request->user());

            return $next($request);
        }
        return redirect('home');
    }

    /*
    |--------------------------------------------------------------------------
    | Additional helper methods for the handle method
    |--------------------------------------------------------------------------
    */

    /**
     * Checks if user has access to this requested route
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Boolean true if has permission otherwise false
     */
    protected function userHasAccessTo($request)
    {
        return $this->hasPermission($request);
    }

    /**
     * hasPermission Check if user has requested route permimssion
     *
     * @param  \Illuminate\Http\Request $request
     * @return Boolean true if has permission otherwise false
     */
    protected function hasPermission($request)
    {
        $required = $this->requiredPermission();

        return !$this->forbiddenRoute($request) && $request->user()->can($required);
    }

    /**
     * Extract required permission from requested route
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String permission_slug connected to the Route
     */
    protected function requiredPermission()
    {
        $route = \Route::currentRouteAction();
        $route = class_basename($route);
        $route = explode("Controller@", $route, 2);

        if($route[1] == "store")
            $route[1] = "create";
        if($route[1] == "update")
            $route[1] = "edit";

        $action = strtolower($route[0]).'/'.$route[1];

        return isset($action) ? $action : null;
    }

    /**
     * Check if current route is hidden to current user role
     *
     * @param  \Illuminate\Http\Request $request
     * @return Boolean true/false
     */
    protected function forbiddenRoute($request)
    {
        $action = $request->route()->getAction();

        if(isset($action['except'])) {

            return $action['except'] == $request->user()->role->slug;
        }

        return false;
    }
}
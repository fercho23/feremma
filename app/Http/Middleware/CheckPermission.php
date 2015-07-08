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
        // return redirect()->route('home');
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
        // dd("Hola");
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
        $required = $this->requiredPermission($request);
         //dd($required);
        //dd(!$this->forbiddenRoute($request), $request->user()->can($required));

        return !$this->forbiddenRoute($request) && $request->user()->can($required);
    }

    /**
     * Extract required permission from requested route
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String permission_slug connected to the Route
     */
    protected function requiredPermission($request)
    {
        $method = $request->method();
        $action = $request->route()->getPath();

        if((strpos($action, '/create') === false) && (strpos($action, '/edit') === false)) {
            if(strpos($action,'/') === false) {
                if($method == 'GET')
                    $action .= '/list';
                if($method == 'POST')
                    $action .= '/create';
            } else {
                if($method == 'GET')
                    $action .= '/detail';
                if(($method == 'PUT') || ($method == 'PATCH'))
                    $action .= '/edit';
                if($method == 'DELETE')
                    $action .= '/delete';
            }
        }

        $action = preg_replace('/({\w+}\/)/', '', $action);

        // return isset($action) ? explode('/', $action) : null;
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
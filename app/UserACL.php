<?php namespace FerEmma;

trait UserACL {

    /**
     * can Checks a Permission
     *
     * @param  String $perm Name of a permission
     * @return Boolean true if has permission, otherwise false
     */
    public function can($perm = null)
    {
        if($perm) {
            return $this->checkPermission($perm);
        }

        return false;
    }

    protected function checkPermission($perm = '')
    {

        $perm = Permission::where('permission_slug', '=', $perm)->first();
        return in_array($perm->id, $this->role->permissions()->getRelatedIds());

    }

    /**
     * hasPermission Checks if has a Permission (Same as 'can')
     *
     * @param  String $perm [Name of a permission
     * @return Boolean true if has permission, otherwise false
     */
    public function hasPermission($perm = null)
    {
        return $this->can($perm);
    }

    /**
     * Checks if has a role
     *
     * @param  String $perm [Name of a permission
     * @return Boolean true if has permission, otherwise false
     */
    public function hasRole($role = null)
    {
        if(is_null($role)) return false;

        return strtolower($this->role->slug) == strtolower($role);
    }

    /**
     * Check if user has given role
     *
     * @param  String $role slug
     * @return Boolean TRUE or FALSE
     */
    public function is($role)
    {
        return $this->role->slug == $role;
    }

    /**
     * Check if user has permission to a route
     *
     * @param  String $routeName
     * @return Boolean true/false
     */
    public function hasRoute($routeName)
    {
        $route = app('router')->getRoutes()->getByName($routeName);

        if($route) {

            $action = $route->getAction();

            if(isset($action['permission'])) {

                $array = explode('_', $action['permission']);

                return $this->checkPermission($array);
            }
        }

        return false;
    }

    /**
     * Check if a top level menu is visible to user
     *
     * @param  String $perm
     * @return Boolean true/false
     */
    public function canSeeMenuItem($perm)
    {
        return $this->can($perm) || $this->hasAnylike($perm);
    }

    /**
     * Checks if user has any permission in this group
     *
     * @param  String $perm Required Permission
     * @param  Array $perms User's Permissions
     * @return Boolean true/false
     */
    protected function hasAnylike($perm)
    {
        $parts = explode('_', $perm);

        $requiredPerm = array_pop($parts);

        $perms = $this->role->permissions->fetch('permission_slug');

        foreach ($perms as $perm)
        {
            if(ends_with($perm, $requiredPerm)) return true;
        }

        return false;
    }
}
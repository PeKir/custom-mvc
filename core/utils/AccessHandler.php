<?php

namespace core\utils;


class AccessHandler
{

    private static $permissions = [];

    /**
     * Permission config must and looks like:
     *
     * [
     *  'admin' => [
     *      'main/index' => true,
     *      'main/news' => true,
     *   ],
     *  'user' => [
     *      'main/index' => true,
     *      'main/news' => true,
     *   ]
     * ]
     *
     * @param array $permissions
     */
    public static function setPermissionConfig($permissions = [])
    {
        self::$permissions = $permissions;
    }

    /**
     * @return array
     */
    public static function getPermissions(): array
    {
        return self::$permissions;
    }

    /**
     * @param $route
     *
     * @return bool
     *  If self::permission = [] always returns true.
     */
    public static function checkAccess($route)
    {
        $controller = $route['controller'];
        if (empty(self::$permissions)) {

            return true;
        } else {
            $rolePermissions = self::$permissions[$_SESSION['role']];
            foreach ($rolePermissions as $controllerName => $access) {
                if ($controllerName == $controller && $access) {
                    return true;
                }
            }
        }

    }


}
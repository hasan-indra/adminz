<?php

namespace App\Services;

class Permission
{
    public static function checkPermission($menu, $permission): bool
    {
        return self::checkHasPermissionMenu($menu, $permission) && self::checkHasPermissionRole($menu, $permission);
    }

    public static function checkHasPermissionMenu($menu, $permission): bool
    {
        $checkMenu = false;
        foreach (Admin::sidebarMenus() as $slug => $detail) {
            if ($slug === $menu) {
                foreach ($detail['route'] as $route) {
                    if ($route === $permission) {
                        $checkMenu = true;
                    }
                }
            }

            foreach ($detail['children'] as $slugChild => $detailChild) {
                if ($slugChild === $menu) {
                    foreach ($detailChild['route'] as $routeChild) {
                        if ($routeChild === $permission) {
                            $checkMenu = true;
                        }
                    }
                }
            }
        }
        return $checkMenu;
    }

    public static function checkHasPermissionRole($menu, $permission): bool
    {
        return auth()->user()->is_superadmin || self::findRolePermission($menu, $permission);
    }

    private static function findRolePermission($menu, $permission): bool
    {
        $model = Admin::injectModel('Permission');
        return $model->where(['menu_name' => $menu, 'permission_name' => $permission, 'role_id' => auth()->user()->role_id])->count() > 0;
    }
}

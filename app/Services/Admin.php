<?php

namespace App\Services;

class Admin
{

   public static function generateAdminUrl($slug): string
    {
        return env('APP_PREFIX') . '/' . $slug;
    }

    public static function pageName(): string
    {
        return ucwords(str_replace("-", " ", request()->segment(2)));
    }

    public static function sidebarMenus(): array
    {
        $menus = [];

        foreach (config('menus') as $key => $menu) {
            if (Permission::checkHasPermissionRole($key, 'index')) {
                $children = $menu['children'];
                $menu['children'] = [];
                $childrenNames = [];

                foreach ($children as $k => $child) {
                    if (Permission::checkHasPermissionRole($k, 'index')) {
                        $menu['children'][$k] = $child;
                        $childrenNames[] = $k;
                    }
                }

                $menu['children_names'] = collect($childrenNames);
                $menus[$key] = $menu;
            }
        }
        return $menus;
    }

    public static function injectModel($modelName) {
       $model = 'App\Models\\'.$modelName;
       return new $model;
    }
}

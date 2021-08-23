<?php

namespace App\Http\Livewire;

use App\Services\Admin;
use App\Traits\Form;
use App\Traits\Listing;
use Livewire\Component;

class Role extends Component
{
    use Listing, Form;

    public $role_name, $role_id;
    public $listPermission = [];
    public $formPermission = [];

    function __construct()
    {
        parent::__construct();
        $this->model = Admin::injectModel('Role');
        $this->permission = Admin::injectModel('Permission');
        $this->namePage = 'role';
    }

    // permission process
    private function checkRolePermission($menuName, $route): bool
    {
        $find = $this->permission->where([
            'role_id' => $this->role_id,
            'menu_name' => $menuName,
            'permission_name' => $route,
        ])->count();

        return $find > 0;
    }

    public function resetFormPermission()
    {
        $this->listPermission = [];
        $this->formPermission = [];
        $this->role_id = '';
    }

    public function permission($roleId)
    {
        $this->role_id = $roleId;
        $this->listPermission = $this->getDataPermission(Admin::sidebarMenus(), $roleId);
    }

    public function getDataPermission($menus): array
    {
        $dataPermission = [];
        foreach ($menus as $menu => $detail) {
            $dataPermission[$menu]['title'] = $detail['title'];
            $dataPermission[$menu]['routes'] = [];
            $dataPermission[$menu]['icon'] = $detail['icon'];
            foreach ($detail['route'] as $route) {
                $rolePermission = $this->checkRolePermission($menu, $route);
                $this->formPermission[$menu][$route] = $rolePermission;
                $dataPermission[$menu]['routes'][] = [
                    $route => $rolePermission,
                ];
            }
            if (array_key_exists('children', $detail)) {
                $dataPermission[$menu]['children'] = $this->getDataPermission($detail['children']);
            }

        }
        return $dataPermission;
    }

    public function savePermission()
    {
        // delete permission by role_id
        $this->deletePermission($this->role_id);
        foreach ($this->formPermission as $menu => $permission) {
            foreach ($permission as $key => $value) {
                if ($value) {
                    $this->permission->create([
                        'role_id' => $this->role_id,
                        'menu_name' => $menu,
                        'permission_name' => $key,
                    ]);
                }
            }
        }
        $this->resetFormPermission();
        $this->emit('hide-modal');
        $this->emit('toast', 'success', 'Save permission success.');

    }

    public function beforeDelete($id): void
    {
        $this->deletePermission($id);
    }

    public function deletePermission($id): void
    {
        $this->permission->where('role_id', $id)->delete();

    }
    // end process permission

    public function formData(): array
    {
        return [
            'role_id' => [
                'type' => 'primary',
            ],
            'role_name' => [
                'type' => 'text',
                'title' => 'Role Name',
            ],
        ];
    }

    protected function rules(): array
    {
        return [
            'role_name' => 'required|string|unique:roles,role_name,' . $this->role_id,
        ];
    }

    public function queryListingHeader(): array
    {
        return ['id', 'role_name', 'created_at', 'updated_at'];
    }

    public function querySearchField(): array
    {
        return ['role_name'];
    }
}

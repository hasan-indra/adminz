<?php

namespace App\Http\Livewire;

use App\Traits\Form;
use App\Traits\Listing;
use App\Services\Admin;
use Livewire\Component;

class User extends Component
{
    use Listing, Form;

    public $user_id, $name, $username, $email, $password, $password_confirmation, $role_id;
    private $role;

    function __construct()
    {
        parent::__construct();
        $this->model = Admin::injectModel('User');
        $this->namePage = 'user';
        $this->role = Admin::injectModel('Role');
    }

    public function formData(): array
    {
        return [
            'user_id' => [
                'type' => 'primary',
            ],
            'name' => [
                'type' => 'text',
                'title' => 'Name',
            ],
            'username' => [
                'type' => 'text',
                'title' => 'Username',
            ],
            'email' => [
                'type' => 'email',
                'title' => 'Email',
            ],
            'role_id' => [
                'type' => 'select',
                'title' => 'Role Name',
                'options' => $this->getOptionRoles(),
            ],
            'password' => [
                'type' => 'password',
                'title' => 'Password',
            ],
            'password_confirmation' => [
                'type' => 'password',
                'title' => 'password Confirmation',
            ],
        ];
    }

    private function getOptionRoles(): array
    {
        $options = [];
        foreach ($this->role->select(['id', 'role_name'])->orderBy('role_name', 'ASC')->get() as $role) {
            $options[$role->id] = $role->role_name;
        }
        return $options;
    }

    protected function createValidation(): array
    {
        return [
            'name' => 'required|string',
            'role_id' => 'required',
            'email' => 'required|string|unique:users,email,' . $this->user_id,
            'username' => 'required|string|unique:users,username,' . $this->user_id,
            'password' => 'required|confirmed',
        ];
    }

    public function updateValidation(): array
    {
        return [
            'name' => 'required|string',
            'role_id' => 'required',
            'email' => 'required|string|unique:users,email,' . $this->user_id,
            'username' => 'required|string|unique:users,username,' . $this->user_id,
            'password' => 'confirmed',
        ];
    }

    public function queryListingHeader(): array
    {
        return ['users.id', 'users.is_active', 'roles.role_name', 'users.name', 'users.username', 'users.email', 'users.created_at', 'users.updated_at'];
    }

    public function querySearchField(): array
    {
        return ['users.name', 'users.username', 'users.email', 'roles.role_name'];
    }

    public function queryWhere($model)
    {
        return $model->where('users.is_superadmin', '<>', 0);
    }

    public function queryJoin($model)
    {
        return $model->join('roles', 'users.role_id', '=', 'roles.id');
    }

    public function beforeForm(): void
    {
        unset($this->data['password_confirmation']);
        if ($this->data['password'] === '') {
            unset($this->data['password']);
        } else {
            $this->data['password'] = bcrypt($this->data['password']);
        }
    }
}

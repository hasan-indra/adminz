<?php

namespace App\Traits;

trait Create
{
    public function beforeCreate(): void
    {
        $this->beforeForm();
    }

    public function afterCreate(): void
    {
        $this->afterForm();
    }

    public function createValidation(): array
    {
        return $this->rules();
    }

    public function create(): void
    {
        $this->data = $this->validate($this->createValidation());
        $this->beforeCreate();
        $this->model->create($this->data);
        $this->resetForm();
        $this->emit('hide-modal');
        $this->emit('toast', 'success', 'Data Created Successfully.');
        $this->afterCreate();
        $this->addFormLogs('create');
    }
}

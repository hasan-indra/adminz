<?php

namespace App\Traits;

trait Update
{
    public function edit($id): void
    {
        $data = $this->findById($id);
        foreach ($this->formData() as $form => $value) {
            if ($value['type'] === 'primary') {
                $this->{$form} = $data->id;
            } else if ($value['type'] === 'password') {
                $this->{$form} = null;
            } else {
                $this->{$form} = $data->{$form};
            }
        }
    }

    public function beforeUpdate(): void
    {
        $this->beforeForm();
    }

    public function afterUpdate(): void
    {
        $this->afterForm();
    }

    public function updateValidation(): array
    {
        return $this->rules();
    }

    public function update(): void
    {
        $this->data = $this->validate($this->updateValidation());
        $this->beforeUpdate();
        $this->model->where('id', $this->role_id)->update($this->data);
        $this->resetForm();
        $this->emit('hide-modal');
        $this->emit('toast', 'success', 'Data is Updated.');
        $this->afterUpdate();
        $this->addFormLogs('update');
    }
}

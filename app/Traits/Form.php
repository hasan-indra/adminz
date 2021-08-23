<?php

namespace App\Traits;

trait Form
{
    use Create, Update, Delete, Activate;
    private $data;

    public function resetForm(): void
    {

        foreach ($this->formData() as $form => $type) {
            $this->{$form} = '';
        }
    }

    public function formData(): array
    {
        return [];
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function cancelForm()
    {
        $this->resetForm();
        $this->emit('remove-invalid');
    }

    public function beforeForm(): void
    {

    }

    public function afterForm(): void
    {

    }
}

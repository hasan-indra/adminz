<?php

namespace App\Traits;

use App\Services\Activity;

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

    private function addFormLogs($event): void
    {
        $description = $event;
        if (isset($this->data)) {
            foreach ($this->data as $data => $value) {
                $description = $description .', '.$data . ' - ' . $value;
            }

        }

        $logs = [
            'user_id' => auth()->user()->id,
            'activity' => $event,
            'description' => $event . ' data ' . $this->namePage . ', ' . $description,
        ];
        Activity::eventLogs($logs);
    }
}

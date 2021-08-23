<?php

namespace App\Traits;

trait Delete
{
    public function beforeDelete($id): void
    {
        // run before delete
    }

    public function afterDelete($deletedData): void
    {
        // run after delete
    }

    public function delete($id): void
    {
        if ($id) {
            $deletedData = $this->findById($id);
            $this->beforeDelete($id);
            $this->model->where('id', $id)->delete();
            $this->emit('toast', 'error', 'Data has been deleted.');
            $this->afterDelete($deletedData);
        }

    }
}

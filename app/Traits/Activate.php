<?php

namespace App\Traits;
trait Activate
{
    public function activatedData($id, $isActive):void {
        $valueDeactive = ($isActive !== '') ? $isActive : false;
        $this->model->where(['id' => $id])->update(['is_active' => $valueDeactive]);
        $message = $isActive ? 'Activated Success' : 'Deactivated Success';
        $this->emit('toast', 'success', $message);
    }
}

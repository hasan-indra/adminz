<?php

namespace App\Http\Livewire;

use App\Services\Admin;
use App\Traits\Listing;
use Livewire\Component;

class Dashboard extends Component
{
    use Listing;

    public $listPermission = [];

    function __construct()
    {
        parent::__construct();
        $this->model = Admin::injectModel('LogActivity');
        $this->namePage = 'dashboard';
    }

    public function mount()
    {
        $this->generateListSort();
        $this->generateTableHeader();
    }

    public function queryListingHeader(): array
    {
        return ['id', 'activity', 'description', 'created_at', 'updated_at'];
    }

    public function queryWhere($model)
    {
        return $model->where('user_id', '<>', auth()->user()->id);
    }

    public function querySearchField(): array
    {
        return ['activity', 'description'];
    }
}

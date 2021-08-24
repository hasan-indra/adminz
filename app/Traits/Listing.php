<?php

namespace App\Traits;

use App\Events\AdminLogActivityEvent;
use Livewire\WithPagination;

trait Listing
{
    use WithPagination;

    public $totalPage = 10;
    public $model;
    public $fields = [];
    public $stringHeader = '';
    public $searchParameter = '';
    public $listSort = [];
    public $sortBy = '';
    public $sortType = 'ASC';
    public $tableHeader = [];
    public $formPage;
    public $namePage = '';

    public function listingView(): string
    {
        return 'livewire.admin';
    }

    public function queryListingHeader(): array
    {
        return [];
    }

    public function querySearchField(): array
    {
        return [];
    }

    public function queryJoin($model)
    {
        return $model;
    }

    public function queryWhere($model)
    {
        return $model->where('id', '<>', 0);
    }

    public function queryData()
    {
        foreach ($this->queryListingHeader() as $header) {
            $this->fields[] = $header;
        }

        $model = $this->model;
        if (!empty($this->fields)) {
            $model = $model->select($this->fields);
        }

        if ($this->searchParameter != '') {
            foreach ($this->querySearchField() as $key => $field) {
                $model->orWhere($field, 'like', '%' . $this->searchParameter . '%');
            }
        }

        $model = $this->queryJoin($model);
        $model->orderBy($this->sortBy, $this->sortType);

        return $model->paginate($this->totalPage);

    }

    private function addListingLogs(): void
    {
        if ($this->namePage !== 'dashboard') {
            $logs = [
                'user_id' => auth()->user()->id,
                'activity' => 'listing',
                'description' => 'view listing ' . $this->namePage,
            ];
            event(new AdminLogActivityEvent($logs));
        }
    }

    public function render()
    {
        $this->addListingLogs();
        return view($this->listingView())->with('data', $this->queryData());
    }

    public function generateListSort()
    {
        foreach ($this->queryListingHeader() as $index => $field) {
            $explodeField = explode('.', $field);
            $fieldData = $explodeField[1] ?? $explodeField[0];
            if ($fieldData !== 'id') {
                $this->listSort[$fieldData] = ucwords(str_replace("_", " ", $fieldData));
            }
            if ($index === 0) {
                $this->sortBy = $fieldData;
            }
        }
    }

    public function generateTableHeader()
    {
        foreach ($this->queryListingHeader() as $header) {
            $explodeHeader = explode('.', $header);
            $headerData = $explodeHeader[1] ?? $explodeHeader[0];
            if ($headerData != 'id') {
                $this->tableHeader[$headerData] = ucwords(str_replace("_", " ", $headerData));
            }
        }
    }

    public function mount()
    {
        $this->generateListSort();
        $this->generateTableHeader();
        $this->formPage = $this->formData();
    }

}


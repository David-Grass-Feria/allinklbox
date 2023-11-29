<?php

namespace App\Traits;

use App\Jobs\DeleteMediaOnDisk;
use Livewire\WithPagination;

trait LivewireIndexTrait

{
    use WithPagination;
    public $model;
    public $search;
    public $orderBy = 'id';
    public $sort = 'DESC';
    public $perPage = 50;
    public $selected = [];

    public function destroyRecords()
    {

        foreach ($this->selected as $recordId) {
            $findRecord = $this->model::find($recordId);
            $this->deleteFilesOnDisk($recordId);
            $findRecord->delete();

        }

        $this->selected = [];

    }
}

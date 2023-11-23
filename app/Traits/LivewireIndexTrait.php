<?php

namespace App\Traits;

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
            (new \App\Services\SaveMediaCollectionService())->deleteMultipleMediaWithDirectory('photo','photos',$recordId,'storagebox');
            (new \App\Services\SaveMediaCollectionService())->deleteMultipleMediaWithDirectory('photo','images',$recordId,'storagebox');
            $findRecord->delete();

        }

        $this->selected = [];

    }
}

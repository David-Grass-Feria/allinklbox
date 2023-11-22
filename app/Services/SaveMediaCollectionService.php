<?php
namespace App\Services;

class SaveMediaCollectionService
{

    public $items = [];
    public $model;
    public $modelId;
    public $collection;
    public function __construct(array $items, $model, string $collection, $modelId)
    {
        $this->items = $items;
        $this->collection = $collection;
        $this->model = $model;
        $this->modelId = $modelId;
    }

    public function saveMedia()
    {
        foreach($this->items as $item){

            $item->store($this->model.'/'.$this->collection.'/'.$this->modelId, 'storagebox');

        }
    }
}

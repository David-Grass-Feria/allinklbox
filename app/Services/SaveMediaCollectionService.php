<?php
namespace App\Services;

use App\Jobs\SaveMediaOnDisk;
use Illuminate\Support\Facades\Storage;

class SaveMediaCollectionService
{


    public $filenames = [];
    public $uploads = [];
    public $model;
    public $collection;
    public $modelId;

    public function __construct(array $uploads, $model, string $collection, int $modelId)
    {
        $this->uploads = $uploads;
        $this->model   = $model;
        $this->collection = $collection;
        $this->modelId = $modelId;

        foreach($this->uploads as $item){
            array_push($this->filenames,$item->getFileName());
        }

        SaveMediaOnDisk::dispatch($this->filenames,$this->model,$this->collection,$this->modelId);

    }


    public function deleteMultipleMediaWithDirectory($model, string $collection, int $modelId)
    {
        $files          = Storage::files($model . '/' . $collection . '/' . $modelId);


        if ($files) {
            foreach ($files as $item) {
                Storage::delete($item);
            }

            Storage::deleteDirectory($model . '/' . $collection . '/' . $modelId);
        }
    }

    public function deleteSingleMedia($filePath)
    {
        if($filePath){
            $file          = Storage::delete($filePath);
        }


    }
}

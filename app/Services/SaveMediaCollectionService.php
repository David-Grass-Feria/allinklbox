<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class SaveMediaCollectionService
{




    public function saveMedia(array $items, $model, string $collection, int $modelId)
    {
        foreach($items as $item){
            $item->store($model.'/'.$collection.'/'.$modelId);
            Storage::delete('livewire-tmp'.'/'.$item->getFileName());
        }
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

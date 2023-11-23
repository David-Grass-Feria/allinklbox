<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class SaveMediaCollectionService
{




    public function saveMedia(array $items, $model, string $collection, int $modelId, string $disk)
    {
        foreach($items as $item){
            $item->store($model.'/'.$collection.'/'.$modelId, $disk);
            Storage::delete('livewire-tmp'.'/'.$item->getFileName());
        }
    }

    public function deleteMultipleMediaWithDirectory($model, string $collection, int $modelId, string $disk)
    {
        $files          = Storage::disk($disk)->files($model . '/' . $collection . '/' . $modelId);


        if ($files) {
            foreach ($files as $item) {
                Storage::disk($disk)->delete($item);
            }

            Storage::disk($disk)->deleteDirectory($model . '/' . $collection . '/' . $modelId);
        }
    }

    public function deleteSingleMedia($filePath,$disk)
    {
        if($filePath){
            $file          = Storage::disk($disk)->delete($filePath);
        }


    }
}

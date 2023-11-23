<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowImagesFromStorageBox extends Component
{
    public $files = [];
    public $record;
    public $model;
    public $collection;
    public $modelId;
    public $disk;



    public function mount()
    {


        $this->files = Storage::disk('storagebox')->files('photo' . '/' . 'photos' . '/' . $this->record->id);



    }



    public function placeholder()
    {
        return view('livewire.placeholder', ['placeholder' => __('Wait for storagebox')]);
    }

    public function deleteMultipleSingleFile(string $item)
    {
        (new \App\Services\SaveMediaCollectionService())->deleteSingleMedia($item, 'storagebox');
        return redirect(request()->header('Referer'));

    }
    public function render()
    {
        return view('livewire.show-images-from-storage-box');
    }
}

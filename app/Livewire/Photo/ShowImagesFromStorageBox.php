<?php

namespace App\Livewire\Photo;

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
    public $enableFileDelete = false;



    public function mount()
    {


        $this->files = Storage::disk($this->disk)->files('photo' . '/' . 'photos' . '/' . $this->record->id);



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
        return view('livewire.photo.show-images-from-storage-box');
    }
}

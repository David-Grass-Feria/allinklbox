<?php

namespace App\Livewire\Video;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowVideosFromStorageBox extends Component
{
    public $files = [];
    public $record;
    public $model;
    public $collection;
    public $modelId;
    public $disk;
    public $enableFileDelete = false;
    public $id;


//test
    public function mount()
    {


        $this->files = Storage::files('video' . '/' . 'videos' . '/' . $this->record->id);


    }





    public function placeholder()
    {
        return view('livewire.placeholder', ['placeholder' => __('Wait for storagebox')]);
    }


    public function render()
    {
        return view('livewire.video.show-videos-from-storage-box');
    }
}

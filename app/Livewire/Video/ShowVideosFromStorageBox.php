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






    public function placeholder()
    {
        return view('livewire.placeholder', ['placeholder' => __('Wait for storagebox')]);
    }


    public function render()
    {
        $files = Storage::files('video' . '/' . 'videos' . '/' . $this->record->id);
        return view('livewire.video.show-videos-from-storage-box',['files' => $files]);
    }
}

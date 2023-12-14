<?php

namespace App\Livewire\Music;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowSongsFromStorageBox extends Component
{
    public $files = [];
    public $record;
    public $model;
    public $collection;
    public $modelId;
    public $enableFileDelete = false;
    public $id;



    public function mount()
    {


        $this->files = Storage::files('music' . '/' . 'songs' . '/' . $this->record->id);



    }





    public function placeholder()
    {
        return view('livewire.placeholder', ['placeholder' => __('Wait for storagebox')]);
    }


    public function render()
    {
        return view('livewire.music.show-songs-from-storage-box');
    }
}

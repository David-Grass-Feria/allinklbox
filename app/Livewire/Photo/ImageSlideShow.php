<?php

namespace App\Livewire\Photo;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ImageSlideShow extends Component
{

    public $activeImage = 0;
    public $files = [];
    public $record;
    public $model;
    public $collection;
    public $modelId;
    public $modal;
    public $disk;

    public function mount()
    {


        $this->files = Storage::disk($this->disk)->files('photo' . '/' . 'photos' . '/' . $this->record->id);

    }



    public function nextImage()
    {
        $this->activeImage = ($this->activeImage + 1) % count($this->files);
    }

    public function prevImage()
    {
        $this->activeImage = ($this->activeImage - 1 + count($this->files)) % count($this->files);
    }

    public function openModal()
    {

        $this->modal = true;
    }

    public function closeModal()
    {

        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.photo.image-slide-show');
    }
}

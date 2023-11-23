<?php

namespace App\Livewire;

use Livewire\Component;

class ImageSlideShow extends Component
{

    public $activeImage = 0;
    public $files = [];
    public $model;
    public $collection;
    public $modelId;
    public $modal;

    public function mount($model, $collection, $modelId, $files)
    {

        $this->model = $model;
        $this->collection = $collection;
        $this->modelId = $modelId;
        $this->files = $files;

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
        return view('livewire.image-slide-show');
    }
}

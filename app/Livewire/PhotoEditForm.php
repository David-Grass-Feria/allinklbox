<?php

namespace App\Livewire;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class PhotoEditForm extends Component
{
    use WithFileUploads;


    public $files;
    public $photos = [];

    #[Validate('required|min:1')]
    public $title;
    public $record;




    public function mount()
    {

        $this->title = $this->record->title;
        $this->files = Storage::disk('storagebox')->files('photo'.'/'.'photos'.'/'.$this->record->id);

    }

    public function save()
    {

        $validated = $this->validate();

        $validated['team_id'] = (new \App\Services\GetCurrentTeamIdService)->get();
        $record = Photo::find($this->record->id);
        $record->update($validated);
        (new \App\Services\SaveMediaCollectionService($this->photos, 'photo', 'photos',$this->record->id))->saveMedia();
        return redirect()->route('photos.index')->with('success', __('Photo edited'));
    }



    public function render()
    {

        return view('livewire.photo-edit-form');
    }
}

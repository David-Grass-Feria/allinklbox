<?php

namespace App\Livewire\Photo;


use App\Jobs\SaveMediaOnDisk;
use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $photos = [];


    #[Validate('required|min:1')]
    public $title;



    public function save()
    {

        $validated = $this->validate();

        $validated['team_id'] = (new \App\Services\GetCurrentTeamIdService)->get();

        $record = Photo::create($validated);
        (new \App\Services\SaveMediaCollectionService($this->photos,'photo','photos',$record->id));

        return redirect()->route('photos.index')->with('success', __('Photo created'));
    }
    public function render()
    {

        return view('livewire.photo.create');
    }
}

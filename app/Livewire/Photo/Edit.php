<?php

namespace App\Livewire\Photo;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Jobs\SaveMediaOnDisk;




class Edit extends Component
{
    use WithFileUploads;



    public $photos = [];




    #[Validate('required|min:1')]
    public $title;
    public $record;




    public function mount()
    {

        $this->title = $this->record->title;



    }





    public function save()
    {

        $validated = $this->validate();

        $validated['team_id'] = (new \App\Services\GetCurrentTeamIdService)->get();
        $record = Photo::find($this->record->id);
        $record->update($validated);
        (new \App\Services\SaveMediaCollectionService($this->photos,'photo','photos',$record->id));
        return redirect()->route('photos.index')->with('success', __('Photo edited'));
    }



    public function render()
    {

        return view('livewire.photo.edit');
    }
}

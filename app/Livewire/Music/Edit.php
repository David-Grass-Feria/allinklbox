<?php

namespace App\Livewire\Music;

use App\Models\Music;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Jobs\SaveMediaOnDisk;




class Edit extends Component
{
    use WithFileUploads;



    public $songs = [];




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
        $record = Music::find($this->record->id);
        $record->update($validated);
        (new \App\Services\SaveMediaCollectionService($this->songs,'music','songs',$record->id));
        return redirect()->route('musics.index')->with('success', __('Music edited'));
    }



    public function render()
    {

        return view('livewire.music.edit');
    }
}

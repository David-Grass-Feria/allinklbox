<?php

namespace App\Livewire\MusicList;

use App\Models\Music;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Jobs\SaveMediaOnDisk;




class Edit extends Component
{









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
        return redirect()->route('musiclists.index')->with('success', __('Music list edited'));
    }



    public function render()
    {

        return view('livewire.music-list.edit');
    }
}

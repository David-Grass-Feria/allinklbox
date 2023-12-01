<?php

namespace App\Livewire\Music;


use App\Jobs\SaveMediaOnDisk;
use App\Models\Music;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $songs = [];


    #[Validate('required|min:1')]
    public $title;



    public function save()
    {

        $validated = $this->validate();

        $validated['team_id'] = (new \App\Services\GetCurrentTeamIdService)->get();

        $record = Music::create($validated);
        (new \App\Services\SaveMediaCollectionService($this->songs,'music','songs',$record->id));

        return redirect()->route('musics.index')->with('success', __('Music created'));
    }
    public function render()
    {

        return view('livewire.music.create');
    }
}

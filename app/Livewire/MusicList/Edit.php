<?php

namespace App\Livewire\MusicList;

use App\Models\Music;
use Livewire\Component;
use App\Jobs\SaveMediaOnDisk;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;




class Edit extends Component
{









    #[Validate('required|min:1')]
    public $title;
    public $record;
    public $songs = [];
    #[Validate('required|array|min:2')]
    public $selected = [];
    public $files = [];


    public $musicListItems = [];


    public function mount()
    {

        $this->title = $this->record->title;

        $this->songs = Music::query()
        ->select('id', 'title')
        ->where('team_id', '=', (new \App\Services\GetCurrentTeamIdService)->get())
        ->get();

        $this->musicListItems = \App\Models\MusicListItem::where('music_lists_id',$this->record->id)->get();
        $this->files = Storage::files('music' . '/' . 'songs' . '/' . $this->record->id);


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

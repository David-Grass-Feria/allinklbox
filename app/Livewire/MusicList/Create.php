<?php

namespace App\Livewire\MusicList;


use App\Jobs\SaveMediaOnDisk;
use App\Models\MusicList;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{





    #[Validate('required|min:1')]
    public $title;


    #[Validate('required|min:2')]
    public $songs = [];

    public function mount()
    {
        $this->songs = \App\Models\Music::query()
        ->select('id', 'title')
        ->where('team_id', '=', (new \App\Services\GetCurrentTeamIdService)->get())
        ->get();
    }



    public function save()
    {

        $validated = $this->validate();

        $validated['team_id'] = (new \App\Services\GetCurrentTeamIdService)->get();

        $record = MusicList::create($validated);
        foreach($this->songs as $item){

            \App\Models\MusicListItem::create([
                'music_id'              => $item->id,
                'music_lists_id'        => $record->id,
            ]);
        }
        return redirect()->route('musiclists.index')->with('success', __('Playlist created'));
    }
    public function render()
    {

        return view('livewire.music-list.create');
    }
}

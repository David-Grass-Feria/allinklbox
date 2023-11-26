<?php

namespace App\Livewire\Video;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;




class Edit extends Component
{
    use WithFileUploads;



    public $videos = [];




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
        $record = Video::find($this->record->id);
        $record->update($validated);
        (new \App\Services\SaveMediaCollectionService())->saveMedia($this->videos, 'videos', 'videos', $record->id, 'storagebox');

        return redirect()->route('videos.index')->with('success', __('Video edited'));
    }



    public function render()
    {

        return view('livewire.video.edit');
    }
}

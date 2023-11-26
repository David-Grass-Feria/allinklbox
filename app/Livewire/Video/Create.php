<?php

namespace App\Livewire\Video;


use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

    public $videos = [];


    #[Validate('required|min:1')]
    public $title;



    public function save()
    {

        $validated = $this->validate();

        $validated['team_id'] = (new \App\Services\GetCurrentTeamIdService)->get();
        $record = Video::create($validated);
        (new \App\Services\SaveMediaCollectionService())->saveMedia($this->videos, 'video', 'videos',$record->id, 'storagebox');
        return redirect()->route('videos.index')->with('success', __('Video created'));
    }
    public function render()
    {

        return view('livewire.video.create');
    }
}

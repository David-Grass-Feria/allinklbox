<?php

namespace App\Livewire\Video;


use Livewire\Component;
use App\Traits\LivewireIndexTrait;


class Index extends Component
{

    use LivewireIndexTrait;





    public function render()
    {
        return view('livewire.video.index', [
            'records' => $this->model::query($this->search)
                ->select('id', 'title')
                ->where('team_id', '=', (new \App\Services\GetCurrentTeamIdService)->get())
                ->where(function ($query) {
                    $query->orWhere('id', 'like', '%' . $this->search . '%')
                        ->orWhere('title', 'like', '%' . $this->search . '%');


                })

                ->orderBy($this->orderBy, $this->sort)
                ->paginate($this->perPage)
        ]);
    }
}

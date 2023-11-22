<?php

namespace App\Livewire;

use App\Models\Photo;
use Livewire\Component;

class PhotoDatatable extends Component
{
    public $photos;
    public $search;
    public $orderBy = 'id';
    public $sort = 'DESC';
    public $perPage = 50;


    public function render()
    {
        return view('livewire.photo-datatable',[
            'records' => Photo::query($this->search)
            ->select('id', 'title')
            ->where('team_id', '=', (new \App\Services\GetCurrentTeamIdService)->get() )
            ->where(function ($query) {
                $query->orWhere('id', 'like', '%' . $this->search . '%')
                    ->orWhere('title', 'like', '%' . $this->search . '%');


            })

            ->orderBy($this->orderBy, $this->sort)
            ->paginate($this->perPage)
        ]);
    }
}

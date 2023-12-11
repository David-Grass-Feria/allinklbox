<?php

namespace App\Livewire\MyPassword;


use Livewire\Component;
use App\Traits\LivewireIndexTrait;


class Index extends Component
{

    use LivewireIndexTrait;





    public function render()
    {
        return view('livewire.my-password.index', [
            'records' => $this->model::query($this->search)
                ->select('id', 'title','user_name','url','notes','password','parameters')
                ->where('team_id', '=', (new \App\Services\GetCurrentTeamIdService)->get())
                ->where(function ($query) {
                    $query->orWhere('id', 'like', '%' . $this->search . '%')
                        ->orWhere('title', 'like', '%' . $this->search . '%')
                        ->orWhere('user_name', 'like', '%' . $this->search . '%')
                        ->orWhere('url', 'like', '%' . $this->search . '%')
                        ->orWhere('notes', 'like', '%' . $this->search . '%');


                })

                ->orderBy($this->orderBy, $this->sort)
                ->paginate($this->perPage)
        ]);
    }

    public function deleteFilesOnDisk($recordId)
    {
        //
    }
}

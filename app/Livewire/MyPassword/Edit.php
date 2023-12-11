<?php

namespace App\Livewire\MyPassword;

use App\Models\Photo;
use Livewire\Component;
use App\Models\MyPassword;
use Illuminate\Support\Str;
use App\Jobs\SaveMediaOnDisk;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;




class Edit extends Component
{









    #[Validate('required|min:1')]
    public $title;
    #[Validate('nullable|min:1')]
    public $username;
    #[Validate('nullable|min:1')]
    public $url;

    #[Validate('nullable|min:8')]
    public $password;
    #[Validate('nullable|min:1')]


    public $parameters;
    public $notes;
    public $record;




    public function mount()
    {

        $this->title = $this->record->title;
        $this->username = $this->record->user_name;
        $this->url = $this->record->url;
        $this->password = $this->record->password;
        $this->notes = $this->record->notes;
        $this->parameters = $this->record->parameters;



    }


    public function generatePassword()
    {
        $this->password = Str::random(20);
    }


    public function save()
    {

        $validated = $this->validate();

        $validated['team_id'] = (new \App\Services\GetCurrentTeamIdService)->get();
        $validated['user_name'] = $this->username;
        $record = MyPassword::find($this->record->id);
        $record->update($validated);

        return redirect()->route('mypasswords.index')->with('success', __('Password updated'));
    }



    public function render()
    {

        return view('livewire.my-password.edit');
    }
}

<?php

namespace App\Livewire\MyPassword;


use App\Models\Photo;
use Livewire\Component;
use App\Models\MyPassword;
use Illuminate\Support\Str;
use App\Jobs\SaveMediaOnDisk;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Create extends Component
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
    public $notes;
    #[Validate('nullable')]
    public $parameters;


    public function generatePassword()
    {
        $this->password = Str::random(20);
    }


    public function save()
    {

        $validated = $this->validate();

        $validated['team_id'] = (new \App\Services\GetCurrentTeamIdService)->get();
        $validated['user_name'] = $this->username;

        $record = MyPassword::create($validated);
        return redirect()->route('mypasswords.index')->with('success', __('Password created'));
    }
    public function render()
    {

        return view('livewire.my-password.create');
    }
}

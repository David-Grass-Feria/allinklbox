<?php

namespace App\Services;

use App\Models\User;

class GetCurrentTeamIdService
{
    public function get()
    {
        $user = User::find(auth()->id());
        $teamId = $user->currentTeam->id;
        return $teamId;
    }
}

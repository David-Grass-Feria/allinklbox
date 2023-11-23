<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class CheckIfUserIsOwnerOfRecord

{
    public function checkIfUserIsOwnerOfRecordOrFile($record)
    {
        if (! Gate::allows('isOwnerOfTeam', $record)) {
            abort(403);
        }
    }
}

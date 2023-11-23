<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PrivateFilesController extends Controller
{
    public function getPrivateFiles($model, string $collection, int $modelId, string $filename)
    {


        $currentTeamId = (new \App\Services\GetCurrentTeamIdService())->get();
        $ucFirstModel = ucfirst($model);
        $modelPath = "\\App\\Models\\$ucFirstModel";
        $record = $modelPath::find($modelId);

        //check if the user is the owner of the record or file
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);

        $stream = Storage::disk('storagebox')->readStream($model . '/' . $collection . '/' . $modelId . '/' . $filename);
        $fileExtension = Storage::disk('storagebox')->mimeType($model . '/' . $collection . '/' . $modelId . '/' . $filename);

        return Response::stream(function () use ($stream) {
            fpassthru($stream);
        }, 200, ['Content-Type' => $fileExtension]);

    }
}

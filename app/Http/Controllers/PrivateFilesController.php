<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PrivateFilesController extends Controller
{
    public function streamFile($model, string $collection, int $modelId, string $filename, string $disk)
    {


        $currentTeamId = (new \App\Services\GetCurrentTeamIdService())->get();
        $ucFirstModel = ucfirst($model);
        $modelPath = "\\App\\Models\\$ucFirstModel";
        $record = $modelPath::find($modelId);

        //check if the user is the owner of the record or file
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);

        $stream = Storage::disk($disk)->readStream($model . '/' . $collection . '/' . $modelId . '/' . $filename);
        $fileExtension = Storage::disk($disk)->mimeType($model . '/' . $collection . '/' . $modelId . '/' . $filename);

        return Response::stream(function () use ($stream) {
            fpassthru($stream);
        }, 200, ['Content-Type' => $fileExtension]);

    }
    public function displayFile($model, string $collection, int $modelId, string $filename, string $disk)
    {
        $ucFirstModel = ucfirst($model);
        $modelPath = "\\App\\Models\\$ucFirstModel";
        $record = $modelPath::find($modelId);
        //check if the user is the owner of the record or file
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);
        $imageUrl = route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => $filename,'disk' => $disk]);

        return view('view-file', compact('imageUrl','record'));

    }
}

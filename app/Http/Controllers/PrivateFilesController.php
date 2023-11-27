<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PrivateFilesController extends Controller
{



    public function streamFile($model, string $collection, int $modelId, string $filename, string $disk)
    {


        $ucFirstModel = ucfirst($model);
        $modelPath = "\\App\\Models\\$ucFirstModel";
        $record = $modelPath::find($modelId);
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
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);

        $imageUrl = route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => $filename, 'disk' => $disk]);

        return view('view-file', compact('imageUrl', 'record'));

    }

    public function downloadFile($model, string $collection, int $modelId, string $filename, string $disk)
    {




        $ucFirstModel = ucfirst($model);
        $modelPath = "\\App\\Models\\$ucFirstModel";
        $record = $modelPath::find($modelId);
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);

        $file = Storage::disk($disk)->get($model . '/' . $collection . '/' . $modelId . '/' . $filename);



        return response($file)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Transfer-Encoding', 'Binary')
            ->header('Content-Disposition', ['attachment; filename=' . $filename]);




    }




}

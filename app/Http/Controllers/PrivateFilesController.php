<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PrivateFilesController extends Controller
{



    public function streamFile($model, string $collection, int $modelId, string $filename)
    {


        $ucFirstModel = ucfirst($model);
        $modelPath = "\\App\\Models\\$ucFirstModel";
        $record = $modelPath::find($modelId);
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);

        //$stream = Storage::readStream($model . '/' . $collection . '/' . $modelId . '/' . $filename);
        $fileExtension = Storage::mimeType($model . '/' . $collection . '/' . $modelId . '/' . $filename);



        //return Response::stream(function () use ($stream) {
        //    fpassthru($stream);
        //}, 200, ['Content-Type' => $fileExtension]);
        $video_path = Storage::url($model . '/' . $collection . '/' . $modelId . '/' . $filename);
        $stream = new \App\Services\VideoStream($video_path);
        $stream->start();








    }
    public function displayFile($model, string $collection, int $modelId, string $filename)
    {

        $ucFirstModel = ucfirst($model);
        $modelPath = "\\App\\Models\\$ucFirstModel";
        $record = $modelPath::find($modelId);
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);

        $imageUrl = route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => $filename]);

        return view('view-file', compact('imageUrl', 'record'));

    }

    public function downloadFile($model, string $collection, int $modelId, string $filename)
    {




        $ucFirstModel = ucfirst($model);
        $modelPath = "\\App\\Models\\$ucFirstModel";
        $record = $modelPath::find($modelId);
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);

        $file = Storage::get($model . '/' . $collection . '/' . $modelId . '/' . $filename);



        return response($file)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Transfer-Encoding', 'Binary')
            ->header('Content-Disposition', ['attachment; filename=' . $filename]);




    }




}

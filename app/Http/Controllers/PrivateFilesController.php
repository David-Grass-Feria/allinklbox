<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        //$stream = Storage::disk($disk)->readStream($model . '/' . $collection . '/' . $modelId . '/' . $filename);
        //$fileExtension = Storage::disk($disk)->mimeType($model . '/' . $collection . '/' . $modelId . '/' . $filename);

        //return Response::stream(function () use ($stream) {
        //    fpassthru($stream);
        //}, 200, ['Content-Type' => $fileExtension]);
        $contentType = "video/mp4";
        $path = $filename;
        $fullsize = filesize($path);
        $size = $fullsize;
        $stream = fopen($path, "r");
        $response_code = 200;
        $headers = array("Content-type" => $contentType);

        // Check for request for part of the stream
        $range = Request::header('Range');
        if($range != null) {
            $eqPos = strpos($range, "=");
            $toPos = strpos($range, "-");
            $unit = substr($range, 0, $eqPos);
            $start = intval(substr($range, $eqPos+1, $toPos));
            $success = fseek($stream, $start);
            if($success == 0) {
                $size = $fullsize - $start;
                $response_code = 206;
                $headers["Accept-Ranges"] = $unit;
                $headers["Content-Range"] = $unit . " " . $start . "-" . ($fullsize-1) . "/" . $fullsize;
            }
        }

        $headers["Content-Length"] = $size;

        return Response::stream(function () use ($stream) {
            fpassthru($stream);
        }, $response_code, $headers);

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

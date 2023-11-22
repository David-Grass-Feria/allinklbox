<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PrivateFilesController extends Controller
{
    public function getPrivateFiles($model, string $collection, int $modelId, string $filename)
    {


        $stream = Storage::disk('storagebox')->readStream($model . '/' . $collection . '/' . $modelId. '/'. $filename);
        $fileExtension = Storage::disk('storagebox')->mimeType($model . '/' . $collection . '/' . $modelId. '/'. $filename);

        return Response::stream(function () use ($stream) {
            fpassthru($stream);
        }, 200, ['Content-Type' => $fileExtension]);

    }
}

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
        //$fileExtension = Storage::mimeType($model . '/' . $collection . '/' . $modelId . '/' . $filename);
        $file = Storage::readStream($model . '/' . $collection . '/' . $modelId . '/' . $filename);
        $filetype = Storage::mimeType($model . '/' . $collection . '/' . $modelId . '/' . $filename);

        //return Response::stream(function () use ($stream) {
        //    fpassthru($stream);
        //}, 200, ['Content-Type' => $fileExtension]);
        if (file_exists($file)) {
            $fp = @fopen($file, 'rb');
            $size = filesize($file); // File size
            $length = $size;           // Content length
            $start = 0;               // Start byte
            $end = $size - 1;       // End byte
            header('Content-type: video/' . $filetype . '');
            //header("Accept-Ranges: 0-$length");
            header("Accept-Ranges: bytes");
            if (isset($_SERVER['HTTP_RANGE'])) {
                $c_start = $start;
                $c_end = $end;
                list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
                if (strpos($range, ',') !== false) {
                    header('HTTP/1.1 416 Requested Range Not Satisfiable');
                    header("Content-Range: bytes $start-$end/$size");
                    exit;
                }
                if ($range == '-') {
                    $c_start = $size - substr($range, 1);
                } else {
                    $range = explode('-', $range);
                    $c_start = $range[0];
                    $c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $size;
                }
                $c_end = ($c_end > $end) ? $end : $c_end;
                if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size) {
                    header('HTTP/1.1 416 Requested Range Not Satisfiable');
                    header("Content-Range: bytes $start-$end/$size");
                    exit;
                }
                $start = $c_start;
                $end = $c_end;
                $length = $end - $start + 1;
                fseek($fp, $start);
                header('HTTP/1.1 206 Partial Content');
            }
            header("Content-Range: bytes $start-$end/$size");
            header("Content-Length: " . $length);
            $buffer = 1024 * 8;
            $s = 0;
            while (!feof($fp) && ($p = ftell($fp)) <= $end) {
                if ($p + $buffer > $end) {
                    $buffer = $end - $p + 1;
                }
                $s = $s + 1;
                //take a break start/my modification
                echo fread($fp, $buffer);
                if ($s >= 500) {
                    ob_clean();
                    ob_flush();
                    flush();
                    break;
                    //take a break
                } else {
                    flush();
                }
            }
            fclose($fp);
            exit();
            //file does not exists:
        } else {
            header("HTTP/1.1 404 Not Found");
            exit;
        }





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

<?php
namespace App\Services;

use App\Jobs\SaveMediaOnDisk;
use Illuminate\Support\Facades\Storage;

class DeleteSingleMediaCollectionService
{


    public $filePath;
    public function __construct($filePath)
    {
        $this->filePath = $filePath;

        if($this->filePath){
            $file          = Storage::delete($this->filePath);
        }

    }





}

<?php
namespace App\Services;

class CreateFileNamesArrayForQueue

{
    public $filenames = [];
    public $uploads;
    public function __construct($uploads)
    {
        $this->uploads = $uploads;

        foreach($this->uploads as $item){
            array_push($this->filenames,$item->getFileName());
        }
    }
}

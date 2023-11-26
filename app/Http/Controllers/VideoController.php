<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return phpinfo();
        return view('videos.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //check if the user is the owner of the record or file
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($video);
        return view('videos.edit',compact('video'));
    }



}

<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('photos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photos.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //check if the user is the owner of the record or file
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($photo);
        return view('photos.edit',compact('photo'));
    }



}

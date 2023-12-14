<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('musics.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('musics.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        return view('musics.edit',compact('music'));
    }


}

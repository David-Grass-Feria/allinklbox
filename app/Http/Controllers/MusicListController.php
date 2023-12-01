<?php

namespace App\Http\Controllers;

use App\Models\MusicList;
use Illuminate\Http\Request;

class MusicListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('musiclists.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('musiclists.create');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MusicList $musicList)
    {
        return view('musiclists.edit',compact('musiclist'));
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\MyPassword;
use Illuminate\Http\Request;

class MyPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mypasswords.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mypasswords.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $record = MyPassword::find($id);
        //check if the user is the owner of the record or file
        (new \App\Services\CheckIfUserIsOwnerOfRecord)->checkIfUserIsOwnerOfRecordOrFile($record);
        return view('mypasswords.edit',compact('record'));
    }

    public function appLogin()
    {

        $appUrl = request()->url.request()->parameters;
        return redirect()->away($appUrl);
    }


}

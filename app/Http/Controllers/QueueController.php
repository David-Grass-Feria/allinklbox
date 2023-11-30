<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;


class QueueController extends Controller
{
    public function queueWork()
    {
        $ipAdress = request()->ip();


            Artisan::call('queue:restart');
            Artisan::call('queue:work --timeout=120 --tries=1');

            return 'ok';


    }
}

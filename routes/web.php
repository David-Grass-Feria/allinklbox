<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\MyPasswordController;
use App\Http\Controllers\PrivateFilesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('dashboard/private/files-view/{model}/{collection}/{modelId}/{filename}/stream',[PrivateFilesController::class,'streamFile'])->name('streamFile');
    Route::get('/dashboard/private/file-view/{model}/{collection}/{modelId}/{filename}/display', [PrivateFilesController::class,'displayFile'])->name('displayFile');
    Route::get('/dashboard/private/file-view/{model}/{collection}/{modelId}/{filename}/download', [PrivateFilesController::class,'downloadFile'])->name('downloadFile');

    Route::resource('/dashboard/mypasswords',MyPasswordController::class)->only(['index','create','edit']);
    Route::post('/app-login', [MyPasswordController::class,'appLogin'])->name('appLogin');
    Route::get('/commands/queue-work',[QueueController::class,'queueWork'])->name('queue.work');



});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PrivateFilesController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::resource('/dashboard/photos',PhotoController::class)->only(['index','create','edit']);
    Route::resource('/dashboard/videos',VideoController::class)->only(['index','create','edit']);


});

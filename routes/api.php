<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadImagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'apiJwt',], function ($router) {
  // CONTROLE DE ACESSO
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  Route::post('refresh', [AuthController::class, 'refresh'])->name('logout'); // refresh token
  Route::post('logged', [AuthController::class, 'logged'])->name('logged'); // who are logged

  // ADICIONE SUAS ROTAS
  Route::resource('upload-images', UploadImagesController::class, ['only' => ['index', 'store']]);
});

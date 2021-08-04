<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('login', 'AuthController@login')->name('login');

Route::group(['middleware' => 'apiJwt',], function ($router) {
  // CONTROLE DE ACESSO
  Route::post('logged', 'AuthController@logged')->name('logged'); // who are logged
  Route::post('logout', 'AuthController@logout')->name('logout');
  Route::post('refresh', 'AuthController@refresh')->name('refresh'); // refresh token

  // ADICIONE SUAS ROTAS
  Route::resource('upload-images', 'UploadImagesController', ['only' => ['index', 'store']]);
});

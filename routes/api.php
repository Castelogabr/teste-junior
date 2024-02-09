<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\PessoaController;

Route::group(['prefix' => 'v1'], function () {
    Route::post('/pessoa', 'Api\PessoaController@store');
    Route::get('/pessoa/{id}', 'Api\PessoaController@show')->where('id', '\d+');
    Route::get('/pessoa', 'Api\PessoaController@index');
    Route::put('/pessoa/{id}', 'Api\PessoaController@update')->where('id','\d+' );
    Route::delete('/pessoa/{id}', 'Api\PessoaController@delete')->where('id','\d+');
});
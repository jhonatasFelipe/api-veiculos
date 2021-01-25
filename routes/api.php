<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'JWTAuthController@register');
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::get('profile', 'JWTAuthController@profile');

});

Route::resource('marca','MarcaController');
Route::resource('modelo','ModeloController');

Route::resource('ano','AnoController');

Route::resource('motor','MotorController');

Route::resource('veiculo','VeiculoController');

Route::resource('imagem','ImagemController');
Route::patch('imagem/mudacapa/{imagem}','ImagemController@mudacapa');

Route::resource('combustivel','CombustivelController');

Route::resource('acessorio','AcessorioController');
Route::post('mail','emailController@enviaInterese');

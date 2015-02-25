<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Enruta en el directorio raíz
Route::get('/', function()
{
	return View::make('login');
});
//Enruta a la pagina de autenticacion
Route::get('/login',function()
{
    return View::make('login');
});

//Envía los datos del formulario al controlador
Route::post('login','UserLoginController@autenticar');

//Enruta al listado de usuarios
Route::controller('ls_users','UsersController');

//agregar usuario
Route::controller('add_user','AddUserController');



Route::controller('users','UsersController');

Route::get('/edit_user',function()
{
    return View::make('edit_user.index');
});

Route::get('/edit_img',function()
{
    return View::make('edit_img.index');
});


//cerrar sesion
Route::get('logout',function()
{
    Auth::logout();
    return Redirect::to('/');
});


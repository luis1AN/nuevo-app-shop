<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mi_primer_ruta', function () {
    return 'Hola Jenny';
});

Route::get('/name/{name}', function ($name) {
    return 'Hola soy '.$name;
});
Route::get('/name/{name}/lastname/{apellido}', function ($name, $apellido) {
    return 'Hola soy '.$name.' '.$apellido;
});
Route::get('/name/{name}/lastname/{apellido}', function ($name, $apellido=null) {
    return 'Hola soy '.$name.' '.$apellido;
});
Route::get('/name/{name}/lastname/{apellido}', function ($name, $apellido='apellido') {
    return 'Hola soy '.$name.' '.$apellido;
});
Route::get('/1er/{n1}/2do/{n2}', function ($n1, $n2) {
	$var=n1+n2;
    return 'La suma es '.$var;
});



/*Route::get('/', function () {
    return  'Pantalla principal';
});*/
Route::get('/login',function(){
	return view ('login');
});
Route::get('/logout',function(){
	return 'logout usuario';
});
Route::get('/catalog',function(){
	return 'listado de peliculas';
});
Route::get('/catalog/show/{id}',function($id){
	return 'Vista detalle pelicula '.$id;
});
/*Route::get('/catalog/create',function(){
	return 'Añadir peliculas';
});*/
Route::get('/catalog/edit/{id}',function($id){
	return 'Modificar pelicula '.$id;
});

/*Route::get('rutaprueba','PruebaController@prueba2');
Route::get('/','HomeController@index');
Route::get('/catalog','CatalogController@catalog');
Route::get('/catalog/show/{id}','CatalogController@show');
Route::get('/catalog/create','CatalogController@create');
Route::get('/catalog/edit/{id}','CatalogController@edit');*/
Route::resource('/trainers','TrainerController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('delete/{id}','TrainerController@destroy');
Route::name('print')->get('/imprimir', 'TrainerController@imprimir');

Route::get('verindi',function(){
    $pdf = PDF::loadView('indi');
    return $pdf->stream();
})->name('verindi');

Route::get('verindi2',function(){
    $pdf = PDF::loadView('indi2');
    return $pdf->stream();
})->name('verindi2');

Route::get('verindi5',function(){
    $pdf = PDF::loadView('indi5');
    return $pdf->stream();
})->name('verindi5');


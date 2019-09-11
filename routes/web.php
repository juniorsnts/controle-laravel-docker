<?php

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::resource('/home', 'HomeController');
Route::resource('/categoria', 'CategoriaController');
Route::get('/caixa', 'CaixaController@index')->name('caixa.index');
Route::resource('/saida', 'SaidaController');
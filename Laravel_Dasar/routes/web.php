<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/companies', 'companiesController@index')->name('companies');
Route::post('/companies', 'companiesController@postcompanies')->name('companiespost');
Route::patch('/companies', 'companiesController@updatecompanies')->name('companiesupdate');
Route::delete('/companies/{id}', 'companiesController@PostDeleteCompanies')->name('PostDeleteCompanies');



Route::get('/employees', 'employeesController@index')->name('employees');
Route::post('/employees', 'employeesController@postemployees')->name('employeespost');
Route::patch('/employees', 'employeesController@updateemployees')->name('employeesupdate');
Route::delete('/employees/{id}', 'employeesController@PostDeleteEmployees')->name('PostDeleteCompanies');

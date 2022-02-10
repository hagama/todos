<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TodosController;
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

 /**
     * Index para mostrar todos los  elementos
     * store  para  guardar  un elemento
     * update para  actualizar  un elemento
     * destroy para eliminar un elemento
     * edit para mostrar el  formulario de edicion

*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tareas', function () {
    return view('todos.index');
});
Route::get('/tareas',[TodosController::class, 'index'])->name('todos');
Route::post('/tareas',[TodosController::class, 'store'])->name('todos');
Route::get('/tareas/{id}',[TodosController::class, 'show'])->name('todos-show');
Route::patch('/tareas/{id}',[TodosController::class, 'update'])->name('todos-update');
Route::delete('/tareas/{id}',[TodosController::class, 'destroy'])->name('todos-destroy');

Route::resource('categories',CategoriesController::class);
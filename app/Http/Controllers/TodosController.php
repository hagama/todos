<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * Index para mostrar todos los  elementos
     * store  para  guardar  un elemento
     * update para  actualizar  un elemento
     * destroy para eliminar un elemento
     * edit para mostrar el  formulario de edicion

*/

//guardar  un elemento
public function store(Request $request){
    $request->validate([
        'title'=>'required|min:3'
    ]);
    $todo = new Todo;
    $todo ->title = $request->title;
    $todo ->save();

    return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
}

//mostrar todos los elementos
public function index(){
$todos=Todo::all();

return view('todos.index', ['todos'=>$todos]);

}

//mostrar elemento individualmente
public function show($id){
    $todo=Todo::find($id);

    return view('todos.show', ['todo'=> $todo]);

    }

//actualizar elemento
public function update(Request $request, $id){
    $todo=Todo::find($id);
    $todo->title = $request->title;
    //dd($todo);
    $todo->save();
    //return view('todos.index', ['success'=>'Tarea Actualizada']);
     return redirect()->route('todos')->with('success','Tarea Actualizada');

    }

//Eliminar elemento
public function destroy($id){
    $todo=Todo::find($id);
    $todo->delete();

    return redirect()->route('todos')->with('success','Tarea Eliminada');

    }









}

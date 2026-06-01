<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TodosController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todos.index', ['salut' => $todos, 'title' => 'salutsalut']);
    }

    public function create(){
        return view('todos.create');
    }

    public function post(){

        $todo = new Todo();
        $todo->owner = Auth::id();
        $todo->title = request()->title;
        $todo->description = request()->description;
        $todo->save();

        return redirect('/todos');
    }
  
        public function form_update($id){
            $todo = Todo::findOrFail($id);
        return view('todos.update', ['todo' => $todo]);
    }

    public function do_update(Request $request){

        $todo = Todo::findOrFail($request->id);
        if($todo->owner != Auth::id())
            abort(403);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return redirect('/todos');
    }


    public function show($id){

        $todo = Todo::findOrFail($id);
        return view('todos.show', ['todo' => $todo]);
    }

    
    public function delete($id){
        $todo = Todo::findOrFail($id);
    if (Auth::id() == $todo->owner) {
        $todo->delete();
        return redirect('/todos')
            ->with('status','Todo#'.$id.'deleted !');
    } else {
        return redirect('/todos')
            ->with('status','You are not the owner of this todo !');
        }
    }
}

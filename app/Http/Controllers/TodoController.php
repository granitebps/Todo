<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{

    public function index()
    {
        // $todos = Todo::orderBy('created_at', 'desc')->get();

        // Will return all of the todo list with order by created_at in descending
        $todos = Todo::get_all();

        return view('todo')->with('todos', $todos);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        // Todo::create([
        //     'todo' => $request->todo
        // ]);

        // Created a new todo
        $param['todo'] = $request->todo;
        Todo::store($param);

        return redirect('todo')->with('success', 'Todo Created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // Filter todo by id
        $todo = Todo::get_id($id);

        return view('edit')->with('todo', $todo);
    }

    public function update(Request $request, $id)
    {
        // Update an existing todo
        $param['todo'] = $request->todo;
        Todo::edit($id, $param);

        return redirect('todo')->with('success', 'Todo Updated');
    }

    public function destroy($id)
    {
        // Delete a todo by id
        Todo::delete_id($id);

        return redirect('todo')->with('alert', 'Todo Deleted');
    }

    public function completed($id)
    {
        // Update an existing todo to make it mark as completed
        Todo::edit_to_complete($id);

        return redirect('todo')->with('success', 'Todo Completed');
    }
}

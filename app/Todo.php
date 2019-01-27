<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';

    protected $fillable = ['todo', 'completed'];

    // Will return all of the todo list with order by created_at in descending
    public function scopeget_all()
    {
        return Todo::orderBy('created_at', 'desc')->get();
    }

    // Create a new todo
    public function scopestore($querry, $param = array())
    {
        return Todo::create([
            'todo' => $param['todo']
        ]);
    }

    // Filter todo by id
    public function scopeget_id($querry, $id)
    {
        return Todo::find($id);
    }

    // Update an existing todo
    public function scopeedit($querry, $id, $param = array())
    {
        $todo = Todo::find($id);
        return $todo->update([
            'todo' => $param['todo']
        ]);
    }

    // Delete a todo by id
    public function scopedelete_id($querry, $id)
    {
        return Todo::find($id)->delete();
    }

    // Update an existing todo to make it mark as completed
    public function scopeedit_to_complete($querry, $id)
    {
        return Todo::find($id)->update([
            'completed' => 1
        ]);
    }
}

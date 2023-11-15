<?php

namespace  App\Service;
use App\Models\Todo;

class TodoService
{

    public function getAllTodos()
    {
        return Todo::lates()->select(['id', 'list'])->get();
    }

    public function showTodoById($id)
    {
        return Todo::findOrFail($id);
    }

    public function createTodo($list)
    {
        Todo::create(['list' => $list]);
        return response()->json(['success' => 'created successfully']);
    }

    public function updateTodo($id,$list)
    {
        $todo = Todo::findOrFail($id);
        $todo->update([
            'list' => $list
        ]);

        return response()->json(['succcess' => 'successfully updated']);
    }

    public function deleteTodo($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response()->json(["message"=> "Delete Successfully"],200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\TodoService;

class TodoController extends Controller
{

    public function index()
    {
        return (new TodoService())->getAllTodos();
    }


    public function store(Request $request)
    {
        $request->validate(['list'=>'required']);

        return (new TodoService)->createTodo($request->list);
    }

    public function show(Request $request)
    {
        return (new TodoService())->showTodoById($request->id);
    }

    public function update(Request $request)
    {
        $request->validate(['list'=>'required']);
        return (new TodoService())->updateTodo($request->id,$request->list);
    }

    public function destroy(Request $request)
    {
        return (new TodoService())->deleteTodo($request->id);
    }
}

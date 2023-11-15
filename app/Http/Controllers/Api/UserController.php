<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return (new UserService)->getAllUsers();
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        return (new UserService)->createUser($request);
    }


    public function show(string $id)
    {
        return (new UserService)->showUserById($id);
    }


    public function update(Request $request)
    {
        $request->validate([
            'id'=> 'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        return (new UserService)->updateUser($request);

    }

    public function destroy(string $id)
    {
        return (new UserService)->deleteUser($id);
    }
}

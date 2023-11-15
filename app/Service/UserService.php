<?php
namespace App\Service;

use App\Models\User;


class UserService
{

    public function getAllUsers()
    {
        return User::latest()->select(['id', 'name','email'])->get();
    }

    public function showUserById($id)
    {
        return User::findOrFail($id);
    }

    public function createUser($val)
    {
        User::create([
            'name' => $val->name,
            'email'=> $val->email,
            'password' => $val->password,
        ]);


        return response()->json(['success' => 'User created successfully']);
    }

    public function updateUser($val)
    {
        $user = User::find($val->id);
        $user->update([
            'name' => $val->name,
            'email'=> $val->email,
            'password' => $val->password,
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['success'=> 'User deleted successfully']);
    }
}

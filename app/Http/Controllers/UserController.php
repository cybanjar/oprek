<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers() {
        $users = DB::table('users')->get();

        return view('users', ['users' => $users]);
    }

    public function addUser(){
        return view('add-user');
    }

    public function addUserSubmit(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return back()->with('user_created', 'Successfully!');
    }

    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return back()->with('user_deleted', 'Success Deleted!');
    }
    

}

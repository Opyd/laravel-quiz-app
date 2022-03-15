<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList(){
        $users = User::all();
        return view('lista', ['users'=>$users]);

    }
    public function addStudent(Request $request){
      $student = new User;
      $student->first_name=$request->input('first_name');
      $student->last_name=$request->input('last_name');
      $student->email=$request->input('email');
      $student->password=bcrypt($request->input('password'));
      $student->isTeacher='0';
      $student->save();
      return redirect('/');

    }
}

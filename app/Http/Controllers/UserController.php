<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function indexPage()
  {
    return redirect('login');
  }

  public function studentList()
  {
    $students = User::all()->where('isTeacher', '=', '0');
    return view('teacher.userList', ['users' => $students]);
  }

  public function addStudent(Request $request)
  {
    $student = new User;
    $student->first_name = $request->input('first_name');
    $student->last_name = $request->input('last_name');
    $student->email = $request->input('email');
    $student->password = bcrypt($request->input('password'));
    $student->isTeacher = '0';
    $student->save();
    return redirect('/teacher/students');
  }

  public function editStudent(int $id)
  {
    $s = User::find($id);

    return view('teacher.editStudent', ['s' => $s]);
  }

  public function saveEditStudent(Request $request, string $id)
  {
    $student = User::find($id);
    $student->first_name = $request->input('first_name');
    $student->last_name = $request->input('last_name');
    $student->email = $request->input('email');
    if ($request->has('leave-password')) {
      $student->password = bcrypt($request->input('password'));
    }
    $student->save();
    return redirect('/teacher/students');
  }

  public function delStudent(Request $request, int $id)
  {
    $e = User::find($id);
    $e->delete();
    return redirect('/teacher/students');
  }
}

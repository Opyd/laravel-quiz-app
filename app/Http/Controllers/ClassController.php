<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\MClass;
use App\Models\Student_class;
use App\Models\Test;
use App\Models\Test_class;
use App\Models\User;
use Illuminate\Http\Request;

class ClassController extends Controller
{
  public function classList()
  {
    $c = MClass::all();
    $t = Test::all();
    $students = User::all()->where('isTeacher', '=', '0');
    return view('classes.classList', ['class' => $c, 'tests' => $t, 'students' =>$students]);
  }

  public function addClass(Request $request)
  {
    $class = new MClass();
    $class->name = $request->input('name');
    $class->save();
    foreach ($request->input('students') as $s) {
      $stToCl = new Student_class();
      $stToCl->m_class_id = $class->id;
      $stToCl->user_id = $s;
      $stToCl->save();
    }
    return redirect('/teacher/classes');
  }
  public function delClass(Request $request, int $id){
    $t = MClass::find($id);
    Student_class::where('m_class_id', $id)->delete();
    $t->delete();
    return redirect('/teacher/classes');
  }
  public function addTestToClass(Request $request){
    $classId = $request->input('class');
    $testId = $request->input('test');
    $check = Test_class::where([['m_class_id','=',$classId], ['test_id','=',$testId]])->get();
    if(count($check)==0){
      $assign = new Test_class();
      $assign->m_class_id = $classId;
      $assign->test_id = $testId;
      $assign->save();
    }
    return redirect('/teacher/classes');
  }
  public function addStudentToClass(Request $request){
    $classId = $request->input('class');
    $studentId = $request->input('student');
    $check = Student_class::where([['m_class_id','=',$classId],['user_id','=',$studentId]])->get();
    if(count($check)==0){
      $assign = new Student_class();
      $assign->m_class_id=$classId;
      $assign->user_id=$studentId;
      $assign->save();
    }
    return redirect('/teacher/classes');
  }
}

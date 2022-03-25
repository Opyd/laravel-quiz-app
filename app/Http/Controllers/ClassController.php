<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\MClass;
use App\Models\Student_class;
use App\Models\Test;
use Illuminate\Http\Request;

class ClassController extends Controller
{
  public function classList()
  {
    $c = MClass::all();
    return view('classes.classList', ['class' => $c]);
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
    redirect('/teacher/classes');
  }
  public function delClass(Request $request, int $id){
    $t = ClassController::find($id);
    Student_class::where('m_class_id', $id)->delete();
    $t->delete();
    return redirect('/teacher/classes');
  }
}

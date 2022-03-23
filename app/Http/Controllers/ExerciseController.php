<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function exercisesList(){
      $exercises = Exercise::all();
      return view('/exercises.exercisesList', ['exercises'=>$exercises]);
    }
  public function addExercise(Request $request){
    $e = new Exercise();
    return $this->extracted($request, $e);
  }
  public function editExercise(string $id){
      $e = Exercise::find($id);
      return view('exercises.editExercise', ['e' => $e]);
  }
  public function saveEditExercise(Request $request, string $id){
      $e = Exercise::find($id);
    return $this->extracted($request, $e);
  }
  public function delExercise(Request $request, int $id){
      $e = Exercise::find($id);
      $e->delete();
      return redirect('/teacher/exercises');
  }

  /**
   * @param Request $request
   * @param $e
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function extracted(Request $request, $e): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
  {
    $e->question = $request->input('question');
    $e->answ_1 = $request->input('answ_1');
    $e->answ_2 = $request->input('answ_2');
    $e->answ_3 = $request->input('answ_3');
    $e->answ_4 = $request->input('answ_4');
    $e->correct = $request->input('correct');
    $e->save();
    return redirect('/teacher/exercises');
  }
}

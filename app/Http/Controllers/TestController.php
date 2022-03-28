<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Result;
use App\Models\Test;
use App\Models\Test_exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
  public function testList()
  {
    $t = Test::all();
    return view('tests.testList', ['tests' => $t]);
  }
  public function studentTests(){
    $t = Test::all();
    //sprawdzenie czy użytkownik brał już udział w teście
    $solvedTests=[];
    foreach ($t as $one_test){
      $temp = Attempt::where([['user_id','=',Auth::user()->id],['test_id','=',$one_test->id]])->get();

      if(count($temp)>0){
        foreach ($temp as $item){
          $solvedTests[]=$item->test_id;
        }
      }
    }
    return view('student.studentPanel', ['student' => \Illuminate\Support\Facades\Auth::user(), 'solvedTests' => $solvedTests]);
  }

  //usuwa powiązanie odpowiedzi do testów i sam test
  public function delTest(Request $request, int $id)
  {
    $t = Test::find($id);
    Test_exercise::where('test_id', $id)->delete();
    $t->delete();
    return redirect('/teacher/tests');
  }

  public function addTest(Request $request)
  {
    $test = new Test();
    $test->title = $request->input('title');
    $test->save();
    foreach ($request->input('exercises') as $e) {
      $exToTest = new Test_exercise();
      $exToTest->test_id = $test->id;
      $exToTest->exercise_id = $e;
      $exToTest->save();
    }
    return redirect('/teacher/tests');
  }

  public function attemptTest(Request $request, int $id)
  {
    $tests = Test::find($id);
    $test = [];
    foreach ($tests->exercises as $t) {
      $temp = [$t->answ_1, $t->answ_2, $t->answ_3, $t->answ_4];
      shuffle($temp);
      $test[] = [$t->id, $t->question, $t->correct, $temp];
    }
    shuffle($test);
    return view('tests.testAttempt', ['test' => $test]);
  }

  public function saveAttempt(Request $request)
  {
    $test_id = $request->input('test_id');
    $exercises = Test::find($test_id);
    $exercises = $exercises->exercises;
    $ids = []; //pytania z poprawnymi odpowiedziami
    $corrects = []; //które zostały poprawnie odpowiedziane
    foreach ($exercises as $e) {
      $ids[] = ["id" => $e->id, "question" => $e->question, "correct" => $e['answ_' . $e->correct]];
    }
//    return $ids;
    $answers = []; //odpowiedzi użytkownika
    foreach ($ids as $id) {
      $temp = $request->input($id["id"]);
      $answers[] = ["id" => $id["id"], "answer" => $temp];
    }
    $pkts=0;
    $max_pkt=0;
    foreach ($answers as $answer) {
      foreach ($ids as $key) {
        if ($answer['id'] == $key['id']) {
          if ($answer['answer'] == $key['correct']) {
            $pkts++;
            $corrects[] = ['test_id' => $test_id, 'student_id' => Auth::user()->id, "exercise_id" => $answer['id'], 'answer' => $answer['answer'], 'correct' => true];
          } else {
            $corrects[] = ['test_id' => $test_id, 'student_id' => Auth::user()->id, "exercise_id" => $answer['id'], 'answer' => $answer['answer'], 'correct' => false];
          }
        }
      }
      $max_pkt++;
    }
    foreach ($corrects as $c){
      $attempt = new Attempt();
      $attempt->test_id = $c['test_id'];
      $attempt->user_id = $c['student_id'];
      $attempt->exercise_id = $c['exercise_id'];
      $attempt->answer = $c['answer'];
      $attempt->correct = $c['correct'];
      $attempt->save();
    }
    $result = new Result();
    $result->student = Auth::user()->first_name.' '.Auth::user()->last_name;
    $result->test = (Test::find($test_id))->title;
    $result->pkt = $pkts;
    $result->max_pkt = $max_pkt;
    $result->save();
    return view('tests.testSummary', ['keys' => $ids, 'user_answers' => $answers]);
  }

  public function studentResults(){
    $results = Result::all();
    return view('teacher.studentResults', ['results' => $results]);
  }
}

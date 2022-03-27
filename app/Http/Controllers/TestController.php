<?php

namespace App\Http\Controllers;

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
      array_push($test, [$t->id, $t->question, $t->correct, $temp]);
    }
    shuffle($test);
    return view('tests.testAttempt', ['test' => $test]);
  }
}

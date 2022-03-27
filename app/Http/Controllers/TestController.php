<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Test_exercise;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testList(){
      $t = Test::all();
      return view('tests.testList', ['tests' => $t]);
    }

    //usuwa powiązanie odpowiedzi do testów i sam test
    public function delTest(Request $request, int $id){
      $t = Test::find($id);
      Test_exercise::where('test_id', $id)->delete();
      $t->delete();
      return redirect('/teacher/tests');
    }

    public function addTest(Request $request){
      $test = new Test();
      $test->title = $request->input('title');
      $test->save();
      foreach ($request->input('exercises') as $e){
        $exToTest = new Test_exercise();
        $exToTest->test_id=$test->id;
        $exToTest->exercise_id=$e;
        $exToTest->save();
      }
      return redirect('/teacher/tests');
    }
}

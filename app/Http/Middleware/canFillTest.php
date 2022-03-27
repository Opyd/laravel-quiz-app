<?php

namespace App\Http\Middleware;

use App\Models\Test;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class canFillTest
{
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return array
   */
  public function handle(Request $request, Closure $next)
  {
    $tests = Test::find($request->route()->parameter('id'));
    $user_classes_id = []; //klasy w jakich jest uczeń
    $test_classes_id = []; //w jakich klasach jest test
    foreach (Auth::user()->classes as $class) {
      array_push($user_classes_id, $class->id);
    }
    foreach ($tests->classes as $class) {
      array_push($test_classes_id, $class->id);
    }
    $flag = false; //flaga która zmieni się na true jeśli test jest przypisany do przynajmniej z jednych klas w których jest uczeń
    foreach ($test_classes_id as $class_id) {
      if (in_array($class_id, $user_classes_id)) {
        $flag = true;
      }
    }
    if (!$flag) {
      return response()->view('tests.notForYou');
    }
    return $next($request);
  }
}

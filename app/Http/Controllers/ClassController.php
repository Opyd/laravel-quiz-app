<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\MClass;
use App\Models\Test;
use Illuminate\Http\Request;

class ClassController extends Controller
{
  public function classList(){
    $c = MClass::all();
    return view('classes.classList', ['class' => $c]);
  }
}

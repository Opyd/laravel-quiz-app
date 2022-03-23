@extends('app')
@section('content')
  <div class="container">
    <a href="/teacher/exercises">
      <button type="button" class="btn btn-outline-primary">Pytania</button>
    </a>
    <a href="/teacher/students">
      <button type="button" class="btn btn-outline-primary">Uczniowie</button>
    </a>
    <a href="/teacher/tests">
      <button type="button" class="btn btn-outline-primary">Testy</button>
    </a>
    <a href="/teacher/classes">
      <button type="button" class="btn btn-outline-primary">Klasy</button>
    </a>
  </div>



@endsection

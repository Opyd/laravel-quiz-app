@extends('app')
@section('content')
  <div class="container">
    <h1>Witaj student {{$student['first_name']}}</h1>
{{--    <a href="/teacher/addStudent"><button type="button" class="btn btn-outline-primary">Dodaj ucznia</button></a>--}}
{{--    <a href="/teacher/exercises"><button type="button" class="btn btn-outline-primary">Pytania</button></a>--}}
  </div>



@endsection

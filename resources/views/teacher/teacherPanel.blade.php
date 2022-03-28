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
    <a href="/teacher/student/results">
      <button type="button" class="btn btn-outline-primary">Wyniki</button>
    </a>
    <table class="table">
      <thead>
      <th>Imie</th>
      <th>Nazwisko</th>
      <th>Email</th>
      <th></th>
      </thead>
      <tr>
        <td>{{$teacher->first_name}}</td>
        <td>{{$teacher->last_name}}</td>
        <td>{{$teacher->email}}</td>
        <td><a href="/teacher/student/{{\Illuminate\Support\Facades\Auth::user()->id}}">Edytuj</a></td>
      </tr>
    </table>
  </div>




@endsection

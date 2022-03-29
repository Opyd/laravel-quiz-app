@extends('app')
@section('content')
  <div class="container">
    <a href="/teacher/addClass">
      <button type="button" class="btn btn-outline-primary">Dodaj klasę</button>
    </a>

    <table class="table">
      <tr>
        <th>ID</th>
        <th>Nazwa</th>
        <th>Uczniowie</th>
        <th>Testy</th>
        <th colspan="2">Ustawienia</th>
      </tr>
      @foreach($class as $t)
        <tr>
          <td>{{$t['id']}}</td>
          <td>{{$t['name']}}</td>
          <td>
            <ul>
              @foreach($t->students as $s)
                <li>{{$s->first_name}} {{$s->last_name}}</li>
              @endforeach
            </ul>
          </td>
          <td>
            <ul>
              @foreach($t->tests as $test)
                <li>{{$test->title}}</li>
              @endforeach
            </ul>
          </td>
          <td>
            <form method="post" action="{{route('delClass', $t['id'])}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" value="Usuń" class="btn btn-danger">
            </form>
          </td>
          <td><a href="/teacher/class/{{$t['id']}}" class="btn btn-info">Edytuj</a></td>
        </tr>
      @endforeach
    </table>
    Przypisz test dla klasy:
    <form method="post" action="{{route('addTestToClass')}}">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <select name="class" class="form-select-sm">
        @foreach($class as $c)
          <option value="{{$c->id}}">{{$c->name}}</option>
        @endforeach
      </select>
      <select name="test" class="form-select-sm">
        @foreach($tests as $s)
          <option value="{{$s->id}}">{{$s->title}}</option>
        @endforeach
      </select>
      <input type="submit" class="btn btn-primary" value="Dodaj">
    </form>
    Dodaj ucznia do klasy:
    <br/>
    <form method="post" action="{{route('addStudentToClass')}}">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <select name="class" class="form-select-sm ">
        @foreach($class as $c)
          <option value="{{$c->id}}">{{$c->name}}</option>
        @endforeach
      </select>
      <select name="student" class="form-select-sm">
        @foreach($students as $s)
          <option value="{{$s->id}}">{{$s->first_name}} {{$s->last_name}}</option>
        @endforeach
      </select>
      <input type="submit" class="btn btn-primary" value="Dodaj">
    </form>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  -->
@endsection

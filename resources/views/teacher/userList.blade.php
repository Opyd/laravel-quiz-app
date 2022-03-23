@extends('app')
@section('content')
  <div class="container">
    <a href="/teacher/addStudent">
      <button type="button" class="btn btn-outline-primary">Dodaj ucznia</button>
    </a>

    <table class="table">
      <tr>
        <th>ID</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Email</th>
        <th>Klasa</th>
        <th>Opcje</th>
      </tr>
      @foreach($users as $student)
        <tr>
          <td>{{$student['id']}}</td>
          <td>{{$student['first_name']}}</td>
          <td>{{$student['last_name']}}</td>
          <td>{{$student['email']}}</td>
          <td>{{'temp'}}</td>
          <td>
            <form method="post" action="{{route('delStudent', $student['id'])}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" value="Usuń">
            </form>
          </td>
          <td><a href="/teacher/student/{{$student['id']}}">Edytuj</a></td>
        </tr>
      @endforeach
    </table>
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

@extends('app')
@section('content')
  <div class="container">
    <table class="table">
      <thead>
      <th>ID ucznia</th>
      <th>Uczeń</th>
      <th>Test</th>
      <th>Liczba punktów</th>
      <th>Max. liczba punktów</th>
      </thead>
      @foreach($results as $r)
        <tr>
          <td>{{$r->id}}</td>
          <td>{{$r->student}}</td>
          <td>{{$r->test}}</td>
          <td>{{$r->pkt}}</td>
          <td>{{$r->max_pkt}}</td>
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

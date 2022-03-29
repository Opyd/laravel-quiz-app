@extends('app')
@section('content')
  <div class="container">
    <table class="table">
      <thead>
      <th>Pytanie</th>
      <th>Twoja odpowiedź</th>
      <th>Poprawna odpowiedź</th>
      <th>Poprawność</th>
      </thead>
      @php
      $x = 0;
      @endphp
      @foreach($keys as $k)
        @foreach($user_answers as $user)
          @if($k['id'] == $user['id'])
            <tr>
              <td>{{$k['question']}}</td>
              <td>{{$user['answer']}}</td>
              <td>{{$k['correct']}}</td>
              @if($k['correct']==$user['answer'])
                @php
                  $x++;
                @endphp
                <td class="border-3 border-success text-center">✅</td>
              @else
                <td class="border-3 border-danger text-center">❌</td>
              @endif
            </tr>
          @endif
        @endforeach
      @endforeach
    </table>
    <h2 class="text-center">Liczba punktów: {{$x}} / {{count($user_answers)}}</h2>
    <a href="/student/" class="btn btn-outline-primary">Zakończ test</a>
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

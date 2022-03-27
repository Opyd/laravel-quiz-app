@extends('app')
@section('content')
  <div class="container">
    <h1>Witaj student {{$student->first_name}}</h1>
    <h2>Twoje testy:</h2>
    <div class="row">
      @foreach($student->classes as $c)
        @foreach($c->tests as $t)
          <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="{{asset('/test.png')}}" alt="Card image cap" style="width: 18rem">
              <div class="card-body">
                <h5 class="card-title">Test</h5>
                <p class="card-text">{{$t->title}}</p>
                <a href="#" class="btn btn-primary">Rozwiąż</a>
              </div>
            </div>
          </div>
        @endforeach
      @endforeach
    </div>
  </div>



@endsection

@extends('app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Dodawanie pytania</div>

          <div class="card-body">
            <form method="POST" action="{{ route('saveEditExercise', $e->id) }}">
              @csrf
              <div class="row mb-3">
                <label for="question" class="col-md-4 col-form-label text-md-end">Treść</label>

                <div class="col-md-6">
                  <input id="question" type="text" class="form-control @error('question') is-invalid @enderror"
                         name="question" value="{{$e->question}}" required autocomplete="question" autofocus>

                  @error('question')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="answ_1" class="col-md-4 col-form-label text-md-end">Odpowiedź 1</label>

                <div class="col-md-6">
                  <input id="answ_1" type="text" class="form-control @error('answ_1') is-invalid @enderror"
                         name="answ_1" value="{{ $e->answ_1 }}" required autocomplete="answ_1" autofocus>

                  @error('answ_1')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
              </div>
            <div class="row mb-3">
              <label for="answ_2" class="col-md-4 col-form-label text-md-end">Odpowiedź 2</label>

              <div class="col-md-6">
                <input id="answ_2" type="text" class="form-control @error('answ_2') is-invalid @enderror"
                       name="answ_2" value="{{ $e->answ_2  }}" required autocomplete="answ_2" autofocus>

                @error('answ_2')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="answ_3" class="col-md-4 col-form-label text-md-end">Odpowiedź 3</label>

              <div class="col-md-6">
                <input id="answ_3" type="text" class="form-control @error('answ_3') is-invalid @enderror"
                       name="answ_3" value="{{ $e->answ_3  }}" required autocomplete="answ_3" autofocus>

                @error('answ_3')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="answ_4" class="col-md-4 col-form-label text-md-end">Odpowiedź 4</label>

              <div class="col-md-6">
                <input id="answ_4" type="text" class="form-control @error('answ_3') is-invalid @enderror"
                       name="answ_4" value="{{ $e->answ_4  }}" required autocomplete="answ_4" autofocus>

                @error('answ_4')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
            <label for="answ_4" class="col-md-4 col-form-label text-md-end">Poprawna</label>

            <div class="col-md-6">
              @for($i=1; $i<=4; $i++)
                @if($e->correct==$i)
                  <input type="radio" name="correct" value="{{$i}}" checked>{{$i}}
              @else
              <input type="radio" name="correct" value="{{$i}}"}>{{$i}}
              @endif
              @endfor
              @error('answ_4')
              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
              @enderror
            </div>
          </div>
              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Edytuj
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

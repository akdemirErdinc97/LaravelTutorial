@extends('front.index')

@section('content')

  <div class="my-3 row col-12 col-md-9 mx-auto">

    @if($content->count() > 0)

      @foreach($content as $key => $value)

        <div class="col-12 col-md-6 p-2">
          <div class="bg-white shadow rounded p-2">
            <div class="text-center">
              <h5 class="mt-2">{{$value->title}}</h5>
            </div>
            <div class="text-justify bg-white shadow rounded p-3 m-2" style="height:250px; overflow: hidden; overflow-y: auto;">
              <p>
                {!!$value->content!!}
              </p>
            </div>
            <div class="d-flex justify-content-end mx-1 p-2">
              <small>{{$value->created_at}}</small>
            </div>
          </div>
        </div>

      @endforeach

    @else

      <div class="col-12 text-center">
        <h1>İçerik Bulunamadı!</h1>
      </div>

    @endif

  </div>

  @if($content->count() > 0)

    <!-- SAYFALAMA -->
    <div class="d-flex justify-content-center">
      {{$content->links("pagination::bootstrap-4")}}
    </div>

  @endif


@endsection

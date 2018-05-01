@extends('layouts/app')
@section('content')
<div class="my-3 p-3 bg-light rounded box-shadow">
    <div class="row">
      <div class="col-md-5 mb-4">
        <ul class="list-group mb-3 mr-5">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ชื่อสิ่สิ่งของ</h6>
            </div> <span class="text-muted p-2">{{$donate_item->title}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">รายละเอียด</h6>
            </div> <span class="text-muted p-2">{{$donate_item->description}}</span> </li>

          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ประเภท</h6>
           </div> <span class="text-muted p-2">{{$donate_item->category}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ผู้ให้บริจาค</h6>
            </div> <a href="{{ url('profile/'.$donate_item->user_id)}}  "><span class="text-muted p-2">{{$donate_item->user->fname}}</span></a> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">เริ่มบริจาคเมื่อ</h6>
            </div> <span class="text-muted p-2">{{$donate_item->open_time}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">เวลาปิดบริจาค</h6>
            </div> <span class="text-muted p-2">{{$donate_item->close_time}}</span> </li>

        </ul>
        @if(auth()->id() == $donate_item->user_id)
        <div class="card p-2 mr-5" align="center">
          คุณเป็นเจ้าของสิ่งของบริจาคนี้
        </div>

        @else
        @if ( !empty ( $user ) )
        <div class="card p-2 mr-5" align="center">
          คำขอรับบริจาคถูกส่งไปแล้ว <br> คำขอ : {{ $user -> request}} <br> ส่งเมื่อ {{ $user -> created_at}}
        </div>


        @else
        <form class="card p-2 mr-5" action="/request_item" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$donate_item->id}}"/>
          <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right ">Request</label>

              <div class="col-md-6">
                  <textarea class="form-control" id="description" rows="3" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"></textarea>
                  @if ($errors->has('description'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Request Now</button>
        </form>
        @endif
        @endif
      </div>
      <div class="col-md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 420px;width: 600px;">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

          </ol>
          <div class="carousel-inner" style="height: 420px;width: 650px;">
            @foreach(json_decode($donate_item->images, true) as $images)
            @if ($loop->first)
            <div class="carousel-item w-100 active" >
              <img class="d-block" src="{{ asset('storage/image/DonateItemImage/'.$donate_item->id.'/'.$images)}}" alt="slide" style="height: 420px;width: 650px;">  </div>
            @else
            <div class="carousel-item w-100">
              <img class="d-block" src="{{ asset('storage/image/DonateItemImage/'.$donate_item->id.'/'.$images)}}" alt="slide" style="height: 420px;width: 650px;"> </div>
            </div>
            @endif
            @endforeach
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>
      </div>

    </div>
  </div>
@endsection

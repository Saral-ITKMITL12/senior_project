@extends('layouts/app')
@section('content')
<div class="my-3 p-3 bg-light rounded box-shadow">
    <div class="row">
      <div class="col-md-5 mb-4">
        <ul class="list-group mb-3 mr-5">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">Product name</h6>
            </div> <span class="text-muted p-2">{{$donate_item->title}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">Product Description</h6>
            </div> <span class="text-muted p-2">{{$donate_item->description}}</span> </li>

          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">Category</h6>
           </div> <span class="text-muted p-2">#</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">Create By</h6>
            </div> <a href="{{ url('profile/'.$user->id)}}  "><span class="text-muted p-2">{{$user->fname}}</span></a> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">Create At</h6>
            </div> <span class="text-muted p-2">{{$donate_item->open_time}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">Close At</h6>
            </div> <span class="text-muted p-2">{{$donate_item->close_time}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">Current Price</h6>
            </div> <strong class="p-2">{{$donate_item->price}}</strong> </li>
        </ul>
        <form class="card p-2 mr-5">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Bid Now</button>
        </form>
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

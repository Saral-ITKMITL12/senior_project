@extends('layouts.app')

@section('content')
@include('auction_product/search_tab')
<div class="container" id="main">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header"><h4>สินค้าประมูลใหม่</h4></div>

                <div class="row">
                  @foreach($auction as $ap)
                  <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                    <div class="card h-100 m-1">
                      <a href="#"><img class="m-2 rounded" style="width: 190px; height: 190px;" src="{{ asset('storage/image/AuctionProductImage/'.$ap->id.'/'.json_decode($ap->images, true)[0]) }}" alt=""></a>
                      <div class="card-body" >
                        <h4 class="card-title yourBoxOne">
                          {{$ap->title}}
                        </h4>
                          <p class="card-text yourBox">{{$ap->description}}</p>
                          <ul class="list-group list-group-flush">

                            <li class="list-group-item">ราคาปัจจุบัน : {{$ap->price}}</li>
                            <li class="list-group-item">{{$ap->user->fname}}</li>
                          </ul>

                          <small class="text-muted">เวลาที่เหลือ : {{$ap->close_time->diffForHumans()}}</small>
                          <br>
                          <div class="card-footer" align="center" >
                        <a class="btn btn-primary btn-block" href="auction_product/{{$ap->id}}" role="button">ดู</a>
                         </div>
                      </div>

                    </div>
                  </div>
                  @endforeach

                </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header"><h4>สิ่งของบริจาคใหม่</h4></div>

                    <div class="row">
                      @foreach($donate as $ap)
                      <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                        <div class="card h-100 m-1">
                          <a href="#"><img class="m-2 rounded" style="width: 190px; height: 190px;" src="{{ asset('storage/image/DonateItemImage/'.$ap->id.'/'.json_decode($ap->images, true)[0]) }}" alt=""></a>
                          <div class="card-body" >
                            <h4 class="card-title yourBoxOne">
                              {{$ap->title}}
                            </h4>
                              <p class="card-text yourBox">{{$ap->description}}</p>
                              <ul class="list-group list-group-flush">

                                <li class="list-group-item yourBoxOne pb-1">เงื่อนไข : {{$ap->condition}}</li>
                                <li class="list-group-item">{{$ap->user->fname}}</li>
                              </ul>

                              <small class="text-muted">เวลาที่เหลือ : {{$ap->close_time->diffForHumans()}}</small>
                              <br>
                              <div class="card-footer" align="center" >
                            <a class="btn btn-primary btn-block" href="donate_item/{{$ap->id}}" role="button">ดู</a>
                             </div>
                          </div>

                        </div>
                      </div>
                      @endforeach

                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection

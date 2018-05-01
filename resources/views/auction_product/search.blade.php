@extends('layouts/app')

@section('content')
@include('auction_product/search_tab')
<div id="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header"><h4>รายการ</h4></div>
                  <div class="card-body">

            @foreach($auc_product as $ap)
            <div class="row">
                <div class="media col-9 text-muted pt-3 pl-5">
                    <img alt="32x32" class="mr-2 rounded" style="width: 80px; height: 80px;" src="{{ asset('storage/image/AuctionProductImage/'.$ap->id.'/'.json_decode($ap->images, true)[0]) }}" data-holder-rendered="true">
                    <p class="media-body ml-5 pb-3 mb-0 small lh-125">
                        <strong class="d-block text-gray-dark">ชื่อสินค้า : {{$ap->title}}</strong>รายละเอียด : {{$ap->description}}
                        <br>
                        เริ่มประมูล : {{$ap->open_time}}
                        <br>
                        ปิดประมูล : {{$ap->close_time}}
                        <br>
                        สร้างโดย : <a href="profile/{{$ap->user_id}}"><span class="text-muted p-2">{{$ap->user->fname}}</span></a>
                        <br>
                    </p>
                </div>
                <div class="col-2 pt-5 ">
                    <a class="btn btn-primary btn-block" href="auction_product/{{$ap->id}}" role="button">ดู</a>
                </div>
            </div>
            <hr class="m-3">
            @endforeach

            </div>
            </div>
            </div>
            </div>
            </div>
            </div>

@endsection

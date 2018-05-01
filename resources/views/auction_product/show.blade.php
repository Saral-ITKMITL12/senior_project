@extends('layouts/app')
@section('content')
<div class="my-3 p-3 bg-light rounded box-shadow">
    <div class="form-group row">
      <div class="col-7">
        <div  class="carousel slide ml-5" data-ride="carousel" style="height: 420px;width: 630px;">
          <ol  class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->

          </ol>
          <div class="carousel-inner" style="height: 420px;width: 650px;">
            @foreach(json_decode($auc_product->images, true) as $images)
            @if ($loop->first)
            <div class="carousel-item w-100 active" >
              <img class="d-block" src="{{ asset('storage/image/AuctionProductImage/'.$auc_product->id.'/'.$images)}}" alt="slide" style="height: 420px;width: 650px;">  </div>
            @else
            <div class="carousel-item w-100">
              <img class="d-block" src="{{ asset('storage/image/AuctionProductImage/'.$auc_product->id.'/'.$images)}}" alt="slide" style="height: 420px;width: 650px;"> </div>
            </div>
            @endif
            @endforeach
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>
      </div>
      </div>
      <div class="col-5 ">
        <ul class="list-group mb-3 mr-5">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ชื่อสินค้า</h6>
            </div> <span class="text-muted p-2">{{$auc_product->title}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">รายละเอียด</h6>
            </div> <span class="text-muted p-2">{{$auc_product->description}}</span> </li>

          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ประเภท</h6>
           </div> <span class="text-muted p-2">{{$auc_product->category}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ผู้เปิดประมูล</h6>
            </div> <a href="{{ url('profile/'.$user->id)}}  "><span class="text-muted p-2">{{$user->fname}}</span></a> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">เริ่มประมูลเมื่อ</h6>
            </div> <span class="text-muted p-2">{{$auc_product->open_time}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ปิดประมูล</h6>
           </div> <span class="text-muted p-2">{{$auc_product->close_time}}</span> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ราคาเริ่มต้น</h6>
            </div> <strong class="p-2">{{$auc_product->start_price}}</strong> </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0 p-2">ราคาปัจจุบัน</h6>
            </div> <strong class="p-2">{{$auc_product->price}}</strong> </li>
        </ul>
        @if(auth()->id() == $auc_product->user_id)
        <div class="card p-2 mr-5" align="center">
          คุณเป็นเจ้าของสินค้าประมูลนี้
        </div>

        @else
        <form action="/bid" class="card p-2 mr-5" method="post">
          {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$auc_product->id}}"/>
          <div class="form-group row">
            <label for="bid_price" class="col-md-4 col-form-label text-md-right">bid_price</label>
            <div class="col-md-6">
                <select name="bid_price" class="custom-select d-block w-100" id="bid_price">
                      <option value="">เลือกระดับการประมูล</option>
                      <option value="10" @if (old('bid_price') == "10") {{ 'selected' }} @endif>10</option>
                      <option value="20" @if (old('bid_price') == "20") {{ 'selected' }} @endif>20</option>
                      <option value="30" @if (old('bid_price') == "30") {{ 'selected' }} @endif>30</option>
                      <option value="40" @if (old('bid_price') == "40") {{ 'selected' }} @endif>40</option>
                      <option value="50" @if (old('bid_price') == "50") {{ 'selected' }} @endif>50</option>
                      <option value="100" @if (old('bid_price') == "100") {{ 'selected' }} @endif>100</option>
                </select>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block p-3" type="submit">เสนอราคา</button>
        </form>
        @endif
      </div>
      </div>

    </div>
    <div class="row">
      <div class="col-md-6">


            <table id="test"  class="table table-striped table-sm ml-3 ">
              <thead>
                <tr>
                  <th>ครั้งที่</th>
                  <th>ชื่อผู้เสนอราคา</th>
                  <th>ราคาที่เสนอ</th>
                  <th>สร้างเมื่อ</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              <table>
      </div>
    </div>
  </div>
  <script>
     function getMessage(){
        $.ajax({
           type:'GET',
           url:'/ajax/{{$auc_product->id}}',
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data){
             $("#test > tbody").empty();
             for (var i = 0, len = data.length; i < len; i++) {
               console.log(data[i])
                 var tr = "<tr>";
                 tr += "<td>" + data[i].id + "</td>";
                 tr += "<td>" + data[i].user_name + "</td>";
                 tr += "<td>" + data[i].bid_price + "</td>";
                 tr += "<td>" + data[i].created_at + "</td>";
                 $('#test > tbody').append(tr+"</tr>")
             }
           }
        });
     }
     setInterval(getMessage, 1000);
     // getMessage();

  </script>

@endsection

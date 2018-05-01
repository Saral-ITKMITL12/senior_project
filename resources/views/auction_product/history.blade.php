@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header"><h4>ประวัติการร่วมประมูล</h4></div>
                  <div class="card-body">

            <table class="table table-striped table-sm ml-3 ">
        <thead>
          <tr>
            <th>ชื่อสินค้า</th>
            <th>สถานะ</th>
            <th>ราคาเริ่มต้น</th>
            <th>ราคาปัจจุบัน</th>
            <th>เวลาที่เหลือ</th>
            <th>ผู้ชนะการประมูล</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          @foreach($auc_product as $ap)
          <tr>
            <td>{{$ap->title}}</td>
            <td>{{$ap->status}}</td>
            <td>{{$ap->start_price}}</td>
            <td>{{$ap->price}}</td>
            <td>{{$ap->close_time->diffForHumans()}}</td>
            <td>{{$ap->winner}}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">


              <div>
                  <a class="btn btn-primary btn-block" href="auction_product/{{$ap->id}}" role="button">ดู</a>
              </div>
              </td>
              @endforeach
          </tr>
        </tbody>
      </table>
    </div>
    </div>
    </div>
    </div>
    </div>


@endsection

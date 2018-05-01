@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header"><h4>จัดการสิ่งของบริจาค</h4></div>
                  <div class="card-body">

            <table class="table table-striped table-sm ml-3 ">
        <thead>
          <tr>
            <th>ชื่อสิ่งของ</th>
            <th>สถานะ</th>
            <th>เงื่อนไข</th>
            <th>เหลือเวลาอีก</th>
            <th>ผู้รับ</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          @foreach($donate_item as $ap)
          <tr>
            <td>{{$ap->title}}</td>
            <td>{{$ap->status}}</td>
            <td>{{$ap->condition}}</td>
            <td>{{$ap->close_time->diffForHumans()}}</td>
            <td>{{$ap->recipient}}</td>

            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a class="btn btn-primary btn-block" href="request_list/{{$ap->id}}" role="button">เลือกผู้รับ</a>
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

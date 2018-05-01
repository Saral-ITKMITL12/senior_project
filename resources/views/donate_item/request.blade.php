@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header"><h4>จัดการคำขอรับบริจาค</h4></div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-4 ml-5">
                          ชื่อสิ่งของบริจาค : {{$donate_item->title}}
                        </div>
                        <div class="col-2 ml-2 ">
                          สถานะ : {{$donate_item->status}}
                        </div>
                        <div class="col-4">
                          เงื่อนไข : {{$donate_item->condition}}
                        </div>
                    </div>


            <table class="table table-striped table-sm ml-3 ">
            <thead>
              <tr>
                <th>ชื่อ - นามสกุล</th>
                <th>เพศ</th>
                <th>คณะ</th>
                <th>ปีที่เข้าเรียน</th>
                <th>รายละเอียดคำขอ</th>
                <th>ส่งเมื่อ</th>.

                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach($donate_tran as $ap)
              <tr>
                <td>{{$ap->user->fname}} {{$ap->user->lname}}</td>
                <td>{{$ap->user->gender}}</td>
                <td>{{$ap->user->faculty}}</td>
                <td>{{$ap->user->year}}</td>
                <td>{{$ap->request}}</td>
                <td>{{$ap->created_at}}</td>

                <td>
                <div class="btn-group" role="group" aria-label="Basic example">

              @if($donate_item->status == 'open')
              <form method="post" action="/accept_request">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{$ap->user_id}}"/>
                <input type="hidden" name="donate_item_id" value="{{$ap->donate_item_id}}"/>
                <button class="btn btn-success" type="submit">
                    Accept
                </button>
              </form>
              @endif
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

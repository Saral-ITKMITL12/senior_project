@extends('layouts/app-admin')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header"><h4>จัดการการสมัครสมาชิก</h4></div>
                          <div class="card-body">

                    <table class="table table-striped table-sm m-2 ">
          <thead >
            <tr>
              <th scope="col">#</th>
              <th scope="col">อีเมลล์</th>
              <th scope="col">ชื่อ - นามสกุล</th>
              <th scope="col">รหัสนักศึกษา</th>
              <th scope="col">คณะ</th>
              <th scope="col">สถานะ</th>
              <th scope="col">สมัครเมื่อ</th>
              <th scope="col">รูปบัตรนักศึกษา</th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            @foreach($user as $us)
            <tr>
              <th scope="row">{{$us->id}}</th>
              <td>{{$us->email}}</td>
              <td>{{$us->fname}} {{$us->lname}}</td>
              <td>{{$us->studentcard_id}}</td>
              <td>{{$us->faculty}}</td>
              @if ($us->accept_status === 0)
              <td>
                <button class="btn btn-default">
                    ยังไม่ยืนยัน
                </button>
              </td>
              @elseif ($us->accept_status === 1)
              <td>
                <button class="btn btn-default">
                    ยืนยันแล้ว
                </button>
              </td>
              @elseif ($us->accept_status === 2)
              <td>
                <button class="btn btn-default">
                    ถูกปฏิเสธ
                </button>
              </td>
              @elseif ($us->accept_status === 3)
              <td>
                <button class="btn btn-default">
                    ถูกแบน
                </button>
              </td>



              @endif
              <td>{{$us->created_at}}</td>
              <td><a href="{{asset($us->image_id)}}" data-lightbox="roadtrip" class="ml-3" data-title="ID Card of {{$us->fname}} {{$us->lname}} {{$us->studentcard_id}}">คลิกเพื่อดู</a></td>

              @if ($us->accept_status === 1)
              <td>
                <button class="btn btn-danger">
                    แบนสมาชิก
                </button>
              </td>
              @elseif ($us->accept_status === 2)
              <td>

              </td>
              @elseif ($us->accept_status === 3)
              <td>
                <button class="btn btn-warning">
                    เลิกแบน
                </button>
              </td>
              @else
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">


                <form method="post" action="/admin/AcceptUser">
                    {{ csrf_field() }}
                    <!-- {{ method_field('PATCH') }} -->
                  <input type="hidden" name="id" value="{{$us->id}}"/>
                  <button class="btn btn-success mr-2" type="submit">
                      ยืนยัน
                  </button>
                </form>
                <form method="post" action="/admin/DenyUser">
                    {{ csrf_field() }}
                    <!-- {{ method_field('PATCH') }} -->
                  <input type="hidden" name="id" value="{{$us->id}}"/>
                  <button class="btn btn-danger" type="submit">
                      ปฏิเสธ
                  </button>
                </form>
              </div>

              </td>


              @endif

            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

@endsection

@extends('layouts/app')
@section('content')
<h1>Edit Profile</h1>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">แก้ไขโปรไฟล์</div>

                <div class="card-body">
                  <form method="post" action="{{route('profile.update', $user)}}">
                      {{ csrf_field() }}
                      {{ method_field('patch') }}

<div class="container ml-3 col-12">
  <div class="row pb-5">
    <div class="container col-3 ">
  <img alt="User Pic" style="width: 250px;height: 200px;" src="{{ asset(Auth::user()->image_profile)}}" id="profile-image1" class="img-circle img-responsive">
  <a class ="col-12 ml-5 pl-5" href="profile/{{$user->id}}">View Profile</a>
  </div>
  <div class="container col-5 pt-3">
<div class="panel panel-default">
<div class="panel-heading">ชื่อ - นามสกุล</div>
<div class="panel-body">{{$user->fname}}  {{$user->lname}}</div>
</div>
<div class="container col-12 ">
<div class="panel panel-default">
<div class="panel-heading">คณะ</div>
<div class="panel-body">{{$user->faculty}}</div>
</div>
</div>

</div>
<div class="container col-3 pt-3">
<div class="panel panel-default">
<div class="panel-heading">เพศ</div>
<div class="panel-body">{{$user->gender}}</div>
</div>
<div class="container col-12">
<div class="panel panel-default">
<div class="panel-heading">ปีที่เข้าเรียน</div>
<div class="panel-body">{{$user->year}}</div>
</div>
</div>
</div>

</div>

  <div class="row">
  <div class="container col-3">
<div class="panel panel-default">
<div class="panel-heading">รหัสนักศึกษา</div>
<div class="panel-body">{{$user->studentcard_id}}</div>
</div>
</div>
<div class="container col-3">
<div class="panel panel-default">
<div class="panel-heading">ระดับการศึกษา</div>
<div class="panel-body">ปริญญา{{$user->degree}}</div>
</div>
</div>
<div class="container col-3">
<div class="panel panel-default">
<div class="panel-heading">คะแนนการให้บริจาค</div>
<div class="panel-body">{{$user->donate_point}}</div>
</div>
</div>
<div class="container col-3">
<div class="panel panel-default">
<div class="panel-heading">สถานะ</div>
<div class="panel-body">ยืนยันตัวแล้ว</div>
</div>
</div>
</div>
<div class="row">

  <div class="container col-6">
  <div class="panel panel-default">
  <div class="panel-heading">ที่อยู่</div>
  <div class="panel-body"><input type="text" value="{{$user->address}}" class="form-control" id="address" name="address" ></div>
  </div>
</div>
<div class="container col-6">
<div class="panel panel-default">
<div class="panel-heading">ช่องทางติดต่อ</div>
<div class="panel-body"><input type="text" value="{{$user->line_id}}" class="form-control" id="email" name="line_id" ></div>
</div>
</div>
</div>

      <div class="container col-12 ">
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

</div>
@endsection

@extends('layouts/app-admin')

@section('content')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header"><h4>จัดการสินค้าประมูล</h4></div>
                  <div class="card-body">

            <table class="table table-striped table-sm ml-3 ">
        <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">หัวข้อ</th>
      <th scope="col">รายละเอียด</th>
      <th scope="col">สร้างเมื่อ</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($report as $rp)
    <tr>
      <th scope="row">{{$rp->id}}</th>
      <td><a href="/report/{{$rp->id}}">{{$rp->title}}</a></td>
      <td>{{$rp->description}}</td>
      <td>{{$rp->created_at->toFormattedDateString()}}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
          <a href="{{ URL::to('report/' . $rp->id . '/edit') }}">
           <button type="button" class="btn btn-warning">Edit</button>
          </a>&nbsp;
          <form action="{{url('report', [$rp->id])}}" method="POST">
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" class="btn btn-danger" value="Delete"/>
    </form>
      </div>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

@endsection

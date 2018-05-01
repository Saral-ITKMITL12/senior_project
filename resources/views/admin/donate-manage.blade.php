@extends('layouts/app-admin')

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
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>Condition</th>
            <th>Request</th>.
            <th>Winner</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          @foreach($donate as $ap)
          <tr>
            <td>{{$ap->id}}</td>
            <td>{{$ap->title}}</td>
            <td>{{$ap->status}}</td>
            <td>{{$ap->condition}}</td>
            <td>#</td>
            <td>{{$ap->winner}}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a class="btn btn-primary btn-block" href="{{ url('donate_item/')}}/{{$ap->id}}" role="button">ดู</a>
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

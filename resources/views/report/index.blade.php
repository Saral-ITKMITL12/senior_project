@extends('layouts/app')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <a class="nav-link" href="{{ route('report.create') }}">Create Report</a></li>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Report Title</th>
              <th scope="col">Report Description</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
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
@endsection

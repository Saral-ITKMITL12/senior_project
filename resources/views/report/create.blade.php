@extends('layouts/app')

@section('content')
    <h1>Add New Rerort</h1>
    <hr>
     <form action="/report" method="post">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Report Title</label>
        <input type="text" class="form-control" id="reportTitle"  name="title">
      </div>
      <div class="form-group">
        <label for="description">Report Description</label>
        <input type="text" class="form-control" id="reportDescription" name="description">
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
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

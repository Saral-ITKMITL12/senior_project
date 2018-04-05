@extends('layouts/app')
@section('content')
<h1>Edit report</h1>
<hr>
<form action="{{url('report', [$report->id])}}" method="POST">
<input type="hidden" name="_method" value="PUT">
{{ csrf_field() }}
<div class="form-group">
<label for="title">Report Title</label>
<input type="text" value="{{$report->title}}" class="form-control" id="reportTitle"  name="title" >
</div>
<div class="form-group">
<label for="description">Report Description</label>
<input type="text" value="{{$report->description}}" class="form-control" id="reportDescription" name="description" >
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
<hr>
<div class="container">
    <div class="form-group text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection

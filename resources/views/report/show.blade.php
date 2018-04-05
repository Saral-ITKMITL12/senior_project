@extends('layouts/app')
@section('content')
<h1>Showing report {{ $report->title }}</h1>
<div class="jumbotron text-center">
<p>
<strong>report Title:</strong> {{ $report->title }}<br>
<strong>Description:</strong> {{ $report->description }}
</p>
</div>
@endsection

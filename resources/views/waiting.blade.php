@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Register Successful</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Your register request has been sent to admin. <a class="nav-link" href="{{ route('login') }}">Back to login</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

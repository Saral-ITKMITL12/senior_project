@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header"><h4>Donation List</h4></div>
                  <div class="card-body">
            @foreach($donate_item as $di)
            <div class="row">

                  <div class="media col-9 text-muted pt-3 pl-5">
                      <img alt="32x32" class="mr-2 rounded" style="width: 80px; height: 80px;" src="{{ asset('storage/image/DonateItemImage/'.$di->id.'/'.json_decode($di->images, true)[0]) }}" data-holder-rendered="true">
                      <p class="media-body ml-5 pb-3 mb-0 small lh-125">
                          <strong class="d-block text-gray-dark">Title : {{$di->title}}</strong>Description : {{$di->description}}
                          <br>
                          Start at : {{$di->open_time}}
                          <br>
                          Close at : {{$di->close_time}}
                          <br>
                          Create by : <a href="profile/{{$di->user_id}}"><span class="text-muted p-2">{{$di->user->fname}}</span></a>
                          <br>
                      </p>
                  </div>
                  <div class="col-2 pt-5 ">
                      <a class="btn btn-primary btn-block" href="donate_item/{{$di->id}}" role="button">View</a>
                  </div>
              </div>

            <hr class="m-3">
              @endforeach
              </div>
              </div>
              </div>
              </div>
              </div>
@endsection

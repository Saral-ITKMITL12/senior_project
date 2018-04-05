@extends('layouts/app-admin')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header"><h4>Manage Auction Product</h4></div>
                          <div class="card-body">

                    <table class="table table-striped table-sm m-2 ">
          <thead >
            <tr>
              <th scope="col">#</th>
              <th scope="col">Email</th>
              <th scope="col">FirstName</th>
              <th scope="col">LastName</th>
              <th scope="col">StudentID</th>
              <th scope="col">Faculty</th>
              <th scope="col">Created At</th>
              <th scope="col">StudentCard</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            @foreach($user as $us)
            <tr>
              <th scope="row">{{$us->id}}</th>
              <td>{{$us->email}}</td>
              <td>{{$us->fname}}</td>
              <td>{{$us->lname}}</td>
              <td>{{$us->studentcard_id}}</td>
              <td>{{$us->faculty}}</td>
              <td>{{$us->created_at}}</td>
              <td><a href="{{asset($us->image_id)}}" data-lightbox="roadtrip" data-title="ID Card of {{$us->fname}} {{$us->lname}} {{$us->studentcard_id}}">Click to view studentcard</a></td>

              @if ($us->accept_status === 1)
              <td>
                <button class="btn btn-info">
                    Accepted
                </button>
              </td>
              @elseif ($us->accept_status === 3)
              <td>
                <button class="btn btn-warning">
                    Denied
                </button>
              </td>
              @else
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">


                <form method="post" action="/admin/AcceptUser">
                    {{ csrf_field() }}
                    <!-- {{ method_field('PATCH') }} -->
                  <input type="hidden" name="id" value="{{$us->id}}"/>
                  <button class="btn btn-lg btn-success" type="submit">
                      View
                  </button>
                </form>
                <form method="post" action="/admin/DenyUser">
                    {{ csrf_field() }}
                    <!-- {{ method_field('PATCH') }} -->
                  <input type="hidden" name="id" value="{{$us->id}}"/>
                  <button class="btn btn-lg btn-danger" type="submit">
                      Deny
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

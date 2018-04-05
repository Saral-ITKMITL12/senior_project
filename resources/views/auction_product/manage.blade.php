@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header"><h4>Manage Auction Product</h4></div>
                  <div class="card-body">

            <table class="table table-striped table-sm ml-3 ">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>Current Price</th>
            <th>Bid</th>.
            <th>Winner</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          @foreach($auc_product as $ap)
          <tr>
            <td>{{$ap->id}}</td>
            <td>{{$ap->title}}</td>
            <td>{{$ap->status}}</td>
            <td>{{$ap->price}}</td>
            <td>#</td>
            <td>{{$ap->winner}}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">


              <form method="post" action="/admin/AcceptUser">
                <button class="btn btn-success" type="submit">
                    View
                </button>
              </form>
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

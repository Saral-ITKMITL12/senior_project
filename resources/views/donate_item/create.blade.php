@extends('layouts/app')

@section('content')
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css')}}">
<script src="{{ asset('js\moment.js') }}" charset="utf-8"></script>
<script src="{{ asset('js\th.js') }}" charset="utf-8"></script>
<script src="{{ asset('js\bootstrap-datetimepicker.min.js') }}" charset="utf-8"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header"><h4>Add New Donation Product</h4></div>

                    <div class="card-body mt-4">

     <form action="{{ url('/donate_item') }}" form class="form-horizontal" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}

      <div class="form-group row">
          <label for="title" class="col-md-4 col-form-label text-md-right">Item Title</label>

          <div class="col-md-6">
              <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

              @if ($errors->has('title'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="description" class="col-md-4 col-form-label text-md-right ">Description</label>

          <div class="col-md-6">
              <textarea class="form-control" id="description" rows="3" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"></textarea>
              @if ($errors->has('description'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="description" class="col-md-4 col-form-label text-md-right ">Condition</label>

          <div class="col-md-6 ">
              <textarea class="form-control" id="condition" rows="2" type="text" class="form-control{{ $errors->has('condition') ? ' is-invalid' : '' }}" name="condition" value="{{ old('condition') }}"></textarea>
              @if ($errors->has('condition'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('condition') }}</strong>
                  </span>
              @endif
          </div>
      </div>

    <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Start</label>
    <div class='input-group date col-md-4 ml-4' id='startTime'>
      <input type="datetime-local" class="form-control" name="open_time" required/>

    </div>
    </div>

          <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Expire</label>
        <div class='input-group date col-md-4 ml-4' id='endTime'>
          <input type="datetime-local" class="form-control" name="close_time"required/>

        </div>
      </div>

      <div class="form-group row">
          <label for="images" class="col-md-4 col-form-label text-md-right ">Image</label>
          <div class="col-md-6">
            <input required type="file" class="" name="images[]"  multiple>
                      @if ($errors->has('images'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('images') }}</strong>
                  </span>
              @endif
          </div>
      </div>
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

      <div class="container col-12">
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>

    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">

        var $startTime = $('#startTime');
        var $endTime = $('#endTime');

        $startTime.datetimepicker({
          locale: 'th',
        });
        $endTime.datetimepicker({
          useCurrent: false,
        });

        $startTime.on("dp.change", function(e) {
          $endTime.data("DateTimePicker").minDate(e.date);
        });

        $endTime.on("dp.change", function(e) {
          $startTime.data("DateTimePicker").maxDate(e.date);
        });

        $endTime.on("dp.show", function(e) {
          if (!$endTime.data("DateTimePicker").date()) {
            var defaultDate = $startTime.data("DateTimePicker").date().add(1, 'hours');
            $endTime.data("DateTimePicker").defaultDate(defaultDate);
          }
        });

    </script>


@endsection

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
                    <div class="card-header"><h4>สร้างสินค้าประมูล</h4></div>
                      <div class="card-body mt-4">

     <form action="{{ url('/auction_product') }}" form class="form-horizontal" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}

      <div class="form-group row">
          <label for="title" class="col-md-4 col-form-label text-md-right">ชื่อสินค้า</label>

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
          <label for="description" class="col-md-4 col-form-label text-md-right ">รายละเอียด</label>

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
          <label for="price"  class="col-md-4 col-form-label text-md-right ">ราคาเริ่มต้น</label>

          <div class="col-md-6">
                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" >
              @if ($errors->has('price'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('price') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
        <label for="bid_step" class="col-md-4 col-form-label text-md-right">ระดับการประมูล</label>
        <div class="col-md-6">
            <select name="bid_step" class="custom-select d-block w-100" id="bid_step">
                  <option value="">Select bidding step</option>
                  <option value="10" @if (old('bid_step') == "10") {{ 'selected' }} @endif>10</option>
                  <option value="20" @if (old('bid_step') == "20") {{ 'selected' }} @endif>20</option>
                  <option value="30" @if (old('bid_step') == "30") {{ 'selected' }} @endif>30</option>
                  <option value="40" @if (old('bid_step') == "40") {{ 'selected' }} @endif>40</option>
                  <option value="50" @if (old('bid_step') == "50") {{ 'selected' }} @endif>50</option>
                  <option value="100" @if (old('bid_step') == "100") {{ 'selected' }} @endif>100</option>
            </select>
        </div>
      </div>

      <!-- <div class="form-group row">
          <label for="open_time" class="col-md-4 col-form-label text-md-right">วันเปิดประมูล</label>
          <div class="col-md-6">
              <input type="date" id="open_time" placeholder="Time" value="">
      </div>

    </div>

    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">วันปิดประมูล</label>
        <div class="col-md-6">
            <input type="date" id="close_time" placeholder="Time" value="{{ old('title') }}">
      </div>

    </div> -->
    <div class="form-group row">
      <label for="category" class="col-md-4 col-form-label text-md-right">ประเภท</label>
      <div class="col-md-6">
          <select name="category" class="custom-select d-block w-100" id="category">
                <option value="">Select bidding step</option>
                <option value="อุปกรณ์การเรียนเฉพาะทาง" @if (old('category') == "อุปกรณ์การเรียนเฉพาะทาง") {{ 'selected' }} @endif>อุปกรณ์การเรียนเฉพาะทาง</option>
                <option value="ของใช้ภายในหอพัก" @if (old('category') == "ของใช้ภายในหอพัก") {{ 'selected' }} @endif>ของใช้ภายในหอพัก</option>
                <option value="อุปกรณ์ไอที" @if (old('category') == "อุปกรณ์ไอที") {{ 'selected' }} @endif>อุปกรณ์ไอที</option>
                <option value="หนังสือเรียนและชีทสรุป" @if (old('category') == "หนังสือเรียนและชีทสรุป") {{ 'selected' }} @endif>หนังสือเรียนและชีทสรุป</option>
                <option value="อุปกรณ์กีฬา" @if (old('category') == "อุปกรณ์กีฬา") {{ 'selected' }} @endif>อุปกรณ์กีฬา</option>
                <option value="เครื่องดนตรี" @if (old('category') == "เครื่องดนตรี") {{ 'selected' }} @endif>เครื่องดนตรี</option>
                <option value="อื่นๆ" @if (old('category') == "อื่นๆ") {{ 'selected' }} @endif>อื่นๆ</option>
          </select>
      </div>
    </div>

    <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">เวลาเริ่ม</label>
    <div class='input-group date col-md-4 ml-4' id='startTime'>
      <input type="datetime-local" class="form-control" name="open_time" required/>

    </div>
  </div>

          <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">เวลาปิด</label>
        <div class='input-group date col-md-4 ml-4' id='endTime'>
          <input type="datetime-local" class="form-control" name="close_time" id='endTime'required/>

        </div>
      </div>
      <div class="form-group row">
          <label for="images" class="col-md-4 col-form-label text-md-right ">รูปสินค้า</label>
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
            <button type="submit" class="btn btn-primary">สร้าง</button>
          </div>
      </div>
    </form>
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

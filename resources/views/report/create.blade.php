@extends('layouts/app')

@section('content')
    <div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header"><h4>สร้างการแจ้งปัญหาและร้องเรียน</h4></div>
              <div class="card-body mt-4">

     <form action="/report" method="post">
     {{ csrf_field() }}
      <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">หัวข้อการรายงาน</label>
            <div class="col-md-6">
        <input type="text" class="form-control" id="reportTitle"  name="title">
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">รายละเอียด</label>
        <div class="col-md-6">
          <textarea class="form-control" id="description" rows="3" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"></textarea>

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
<div class="form-group row">
      <div class="container col-12">
        <div class="form-group text-center">
      <button type="submit" class="btn btn-primary">ส่ง</button>
    </div>
    </div>
      </div>
    </form>

    </div>
    </div>
    </div>
    </div>
      </div>
@endsection

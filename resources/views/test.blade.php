@extends('layouts.app')

@section('content')
<h1>Register</h1>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="/testing/upload" enctype="multipart/form-data">
                        @csrf

                          <label>กรุณาอัพโหลดรูปบัตรนักศึกษาเพื่อใช้ยืนยันตัว</label>
                            <input type="file" name="file" id="file" class="form-control" value="{{old('file')}}">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

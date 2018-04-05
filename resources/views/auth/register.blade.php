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
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">อีเมลล์</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">ชื่อจริง</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">นามสกุล</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="studentcard_id" class="col-md-4 col-form-label text-md-right">รหัสนักศึกษา</label>

                            <div class="col-md-6">
                                <input id="studentcard_id" type="text" class="form-control" name="studentcard_id" value="{{ old('studentcard_id') }}" required>
                                @if ($errors->has('studentcard_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('studentcard_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="line_id" class="col-md-4 col-form-label text-md-right">Line ID</label>

                            <div class="col-md-6">
                                <input id="line_id" type="text" class="form-control" name="line_id" value="{{ old('line_id') }}" >
                                @if ($errors->has('line_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('line_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">ที่อยู่</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="gender" class="col-md-4 col-form-label text-md-right">เพศ</label>
                          <div class="col-md-6">
                              <select name="gender" class="form-control" id="gender" required>
                                    <option value="">กรุณาเลือกเพศ</option>
                                    <option value="ชาย" @if (old('gender') == "ชาย") {{ 'selected' }} @endif>ชาย</option>
                                    <option value="หญิง" @if (old('gender') == "หญิง") {{ 'selected' }} @endif>หญิง</option>
                              </select>
                              @if ($errors->has('gender'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('gender') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="faculty" class="col-md-4 col-form-label text-md-right">คณะ</label>
                          <div class="col-md-6">
                              <select name="faculty" class="form-control" id="faculty" required>
                                    <option value="">กรุณาเลือกคณะ</option>
                                    <option value="วิศวกรรมศาสตร์" @if (old('faculty') == "วิศวกรรมศาสตร์") {{ 'selected' }} @endif>คณะวิศวกรรมศาสตร์</option>
                                    <option value="สถาปัตยกรรมศาสตร์" @if (old('faculty') == "สถาปัตยกรรมศาสตร์") {{ 'selected' }} @endif>คณะสถาปัตยกรรมศาสตร์</option>
                                    <option value="ครุศาสตร์อุตสาหกรรมและเทคโนโลยี" @if (old('faculty') == "ครุศาสตร์อุตสาหกรรมและเทคโนโลยี") {{ 'selected' }} @endif>คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี</option>
                                    <option value="เทคโนโลยีการเกษตร" @if (old('faculty') == "เทคโนโลยีการเกษตร") {{ 'selected' }} @endif>คณะเทคโนโลยีการเกษตร</option>
                                    <option value="วิทยาศาสตร์" @if (old('faculty') == "วิทยาศาสตร์") {{ 'selected' }} @endif>คณะวิทยาศาสตร์</option>
                                    <option value="อุตสาหกรรมเกษตร" @if (old('faculty') == "อุตสาหกรรมเกษตร") {{ 'selected' }} @endif>คณะอุตสาหกรรมเกษตร</option>
                                    <option value="เทคโนโลยีสารสนเทศ" @if (old('faculty') == "เทคโนโลยีสารสนเทศ") {{ 'selected' }} @endif>คณะเทคโนโลยีสารสนเทศ</option>
                                    <option value="วิทยาลัยนานาชาต" @if (old('faculty') == "วิทยาลัยนานาชาต") {{ 'selected' }} @endif>วิทยาลัยนานาชาติ</option>
                                    <option value="วิทยาลัยนาโนเทคโนโลยีพระจอมเกล้าลาดกระบัง" @if (old('faculty') == "วิทยาลัยนาโนเทคโนโลยีพระจอมเกล้าลาดกระบัง") {{ 'selected' }} @endif>วิทยาลัยนาโนเทคโนโลยีพระจอมเกล้าลาดกระบัง</option>
                                    <option value="วิทยาลัยนวัตกรรมการจัดการข้อมูล" @if (old('วิทยาลัยนวัตกรรมการจัดการข้อมูล') == "วิทยาลัยนวัตกรรมการจัดการข้อมูล") {{ 'selected' }} @endif>วิทยาลัยนวัตกรรมการจัดการข้อมูล</option>
                                    <option value="วิทยาลัยการบริหารและจัดการ" @if (old('faculty') == "วิทยาลัยการบริหารและจัดการ") {{ 'selected' }} @endif>วิทยาลัยการบริหารและจัดการ</option>
                              </select>
                              @if ($errors->has('faculty'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('faculty') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="year" class="col-md-4 col-form-label text-md-right">ปีที่เข้าศึกษา</label>
                          <div class="col-md-6">
                              <select name="year" class="form-control" id="year" required>
                                    <option value="">กรุณาเลือกปีที่เข้าศึกษา</option>
                                    <option value="2560" @if (old('year') == "2560") {{ 'selected' }} @endif>2560</option>
                                    <option value="2559" @if (old('year') == "2559") {{ 'selected' }} @endif>2559</option>
                                    <option value="2558" @if (old('year') == "2558") {{ 'selected' }} @endif>2558</option>
                                    <option value="2557" @if (old('year') == "2557") {{ 'selected' }} @endif>2557</option>
                                    <option value="2556" @if (old('year') == "2556") {{ 'selected' }} @endif>2556</option>
                                    <option value="2555" @if (old('year') == "2555") {{ 'selected' }} @endif>2555</option>
                                    <option value="2554" @if (old('year') == "2554") {{ 'selected' }} @endif>2554</option>
                              </select>
                              @if ($errors->has('year'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('year') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="degree" class="col-md-4 col-form-label text-md-right">ระดับการศึกษา</label>
                          <div class="col-md-6">
                              <select name="degree" class="form-control" id="degree" required>
                                    <option value="">กรุณาเลือกระดับการศึกษา</option>
                                    <option value="ตรี" @if (old('degree') == "ตรี") {{ 'selected' }} @endif>ปริญญาตรี</option>
                                    <option value="โท" @if (old('degree') == "โท") {{ 'selected' }} @endif>ปริญญาโท</option>
                                    <option value="เอก" @if (old('degree') == "เอก") {{ 'selected' }} @endif>ปริญญาเอก</option>
                              </select>
                              @if ($errors->has('degree'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('degree') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>
                        <div class="container">
                        <hr class="m-3">
                          <label>กรุณาอัพโหลดรูปโปรไฟล์</label>
                            <input type="file" name="file1" id="file1" class="form-control" value="{{old('file1')}}">
                            @if ($errors->has('file1'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('file1') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="container">
                        <hr class="m-3">
                            <label>กรุณาอัพโหลดรูปบัตรนักศึกษาเพื่อใช้ยืนยันตัว</label>
                              <input type="file" name="file2" id="file2" class="form-control" value="{{old('file2')}}" required>
                              @if ($errors->has('file2'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('file2') }}</strong>
                                  </span>
                              @endif
                        </div>
                          <br>
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

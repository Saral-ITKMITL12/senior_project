<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show()
    {
        //$user =User::get(['id', 'name', 'email'])->toArray()
        return view('testing');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      // $file = Input::file('file');
      // $path =  public_path('image');
      // $mime_type = $file->getClientOriginalExtension();
      // $destination_path = 'image.jpg';
      // \Storage::put($destination_path, $file);

      $time = intval(microtime(true)*1000);
      $file = Input::file('file');
      // $path = $request->file('file')->getRealPath();
      $mime_type = $file->getClientOriginalExtension();
      $destination_path = 'image/'.'user'.$mime_type;
      \Storage::putFileAs($destination_path, $file, 'photo.jpg');
        return user::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'studentcard_id' => $data['studentcard_id'],
            'line_id' => $data['line_id'],
            'year' => $data['year'],
            'faculty' => $data['faculty'],
            'degree' => $data['degree'],
            // 'image' =>  $fileName,


        ]);

    }
}

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

    use RegistersUsers;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
     {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'year' => 'required|string',
            'faculty' => 'required|string',
            'degree' => 'required|string|max:10',
            'studentcard_id' => 'required|string|max:10',
            'gender' => 'required|string',
            'address' => 'required|string',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'line_id' => 'string',
            'file1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'file2' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

      }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

      if (Input::hasFile('file1')){
        $file = Input::file('file1');
        $mime_type = $file->getClientOriginalExtension();
        $destination_path = 'image/'.$data['studentcard_id'];
        $studentid = 'CardID_'.$data['studentcard_id'].'.'.$mime_type;
        $fileName = 'storage/'.$destination_path.'/'.$studentid;
        \Storage::putFileAs($destination_path, $file, $studentid);
      }

      if (Input::hasFile('file2')){
        $file2 = Input::file('file2');
        $mime_type2 = $file2->getClientOriginalExtension();
        $destination_path2 = 'image/'.$data['studentcard_id'];
        $studentid2 = 'ProfilePic_'.$data['studentcard_id'].'.'.$mime_type2;
        $fileName2 = 'storage/'.$destination_path2.'/'.$studentid2;
        \Storage::putFileAs($destination_path2, $file2, $studentid2);
      }else {
        $fileName2 = '/default_profile_pic.jpg';
      }


        return user::create([
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
            'image_id' =>  $fileName,
            'image_profile' =>  $fileName2,
        ]);

    }
}

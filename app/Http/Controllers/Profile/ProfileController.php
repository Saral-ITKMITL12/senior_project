<?php

namespace App\Http\Controllers\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
      $user = User::find($id);
      return view('user.show',compact(['user']));
    }

    public function edit(User $user)
    {

        $user = Auth::user();
        return view('user.edit',compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $this->validate(request(), [
               'line_id' => 'required',
               'address' => 'required',
           ]);
        $user->line_id = request('line_id');
        $user->address = request('address');
        $user->update();

        return back();
    }
}

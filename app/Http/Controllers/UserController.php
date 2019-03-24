<?php

namespace MiniSchool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
class UserController extends Controller
{
    // Only Users Can Access These Functions
    public function __construct()
    {
        $this->middleware('auth');
    }
    // The Profile Page
    public function index(){
      return View('auth.profile');
    }
    // The Edit Page
    public function edit(){
      return View('auth.edit');
    }
    // Save After Editing Function
    public function save(Request $request){
        if(Auth::user()->password != '' && Auth::user()->email != $request->email)
          $validator = Validator::make($request->all(), [
              'name' => 'required|max:255',
              'email' => 'required|email|max:255|unique:users',
              'password' => 'required|min:6|confirmed',
          ]);
        elseif (Auth::user()->email == $request->email)
          $validator = Validator::make($request->all(), [
              'name' => 'required|max:255',
              'password' => 'required|min:6|confirmed',
          ]);
        else
          $validator = Validator::make($request, [
              'name' => 'required|max:255',
          ]);
      if ($validator->fails()) {
        return redirect('edit')
                        ->withErrors($validator)
                        ->withInput();
      }
      $user = DB::table('users')
                ->where('id' , Auth::user()->id )
                ->update([ 'name' => $request->name , 'email' => $request->email , 'password' => bcrypt($request->password)]);
      return redirect('edit');

    }
}

<?php

namespace App\Http\Controllers;

use Sentinel;
use Session;
use App\Http\Requests\UserRequest;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;

class UsersController extends Controller
{
    public function signup()
    {
    	return view('users.signup');
    }

    public function signup_store(UserRequest $request)
    {   
    	Sentinel::register($request->all(),true);
    	Session::flash('notice','Success create new user');
    	return redirect()->back();
    }
}

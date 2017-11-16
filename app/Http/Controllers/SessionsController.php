<?php

namespace App\Http\Controllers;
use Sentinel;
use Session;
use App\Http\Requests\SessionRequest;

class SessionsController extends Controller
{	
    public function login()
    {   	
    	if($use = Sentinel::check())
    		{
    			Session::flash("notice","You has login".$use->email);
    			return redirect('/');
    		}else{
    			return view('sessions.create');
    		}
    }

    public function login_store(SessionRequest $request)
    {
 
    	if($user = Sentinel::authenticate($request->all()))
    		{
    			Session::flash("notice", "Welcome ".$user->email);
    			return redirect()->intended('/');
    		}else{
    			Session::flash("error","Login Fails");
    			return view('sessions.create');
    		}
    }

    public function logout()
    {
    	Sentinel::logout();
    	Session::flash("notice","Logout Success");
    	return redirect('/');
    }
}

<?php

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;


class LoginController extends BaseController
{
	

public function login(){
  if(session('user_id') !=null){
    return redirect("/home");
  }
  else{
    /*$old_username = Request::old('username')*/
    return view("login");
    /*->with("old_username",$old_username);*/
  }
}

public function utente(){
  $user = User::where('username',request('username'))->where('password',request("password"))->first();

  if (isset($user)){
    Session::put('user',$user);
    return redirect('/home');
  }else{
    return redirect ('login')->withInput();
  }
}


	public function esci(){
		Session::flush();
		return redirect ("/login");
	}


}

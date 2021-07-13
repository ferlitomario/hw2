<?php

use Illuminate\Routing\Controller as BaseController;


class RegisterController extends BaseController
{
	public function reg(){
			return view('register')
				->with('csrf_token', csrf_token());
	}

	public function registrazione(){
		$email=Request::post("email");

		 $utente=User::where("email",Request::post("email"))->count();
		 if($utente!=0){
			 //L'email è stata già utilizzata
			 return view("register")
					 ->with('csrf_token', csrf_token())
					 ->with('errore',"L'email è stata già utilizzata");
			 }else{
			 //L'email è nuova dunque si può passare alla registrazione in dB
			 $indice=User::all()->count();
			 $new_utente=new User;
			 $new_utente->id=$indice+1;
			 $new_utente->name=Request::post("name");
			 $new_utente->Email=Request::post("email");
			 $new_utente->password=Request::post("password");
			 $new_utente->username=Request::post("username");
			 $new_utente->surname=Request::post("surname");
			 $new_utente->save();

			 return view("login")
					 ->with('csrf_token', csrf_token())
					 ->with('avviso',"Registrazione effettuata! Accedi");


			 //echo "L'utente è stato inserito correttamente";
		 }
	}




}


/*
class RegisterController extends BaseController {

		public function registrazione () {
			$request = request();

			return User::create([
				'id' => $request->id,
				'username' => $request->username,
				'name' => $request->name,
				'surname' => $request->surname,
				'password' => Hash::make($request->password)
			]);
		}

public checkUsername($query){
	$exist = User::where('username',$query)->exists();
	return ['exists' => $exist]
}

public checkEmail($query){
	$exist = User::where('email',$query)->exists();
	return ['exists' => $exist]
}

public function reg(){
	return view('register');
}

}*/


?>

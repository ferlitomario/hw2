<?php use Illuminate\Database\Eloquent\Model;

class User extends Model{

	protected $table="users";
	public $timestamps=false;
	protected $hidden=['password'];


	public function viaggi_utenti(){
		return $this->belongsToMany("viaggi","Preferiti",$Id_Utente,$Id_viaggi);
	}

}


?>

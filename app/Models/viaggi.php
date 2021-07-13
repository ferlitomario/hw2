<?php
use Illuminate\Database\Eloquent\Model;

class VIAGGI extends Model{

	protected $table="catalogo";
	protected $primaryKey="Codice";
	protected $autoIncrement=false;
	public $timestamps=false;

	public function codice_cat(){
		return $this->hasMany("viaggi");
	}
}


?>

<?php

use Illuminate\Routing\Controller as BaseController;

class PrenotazioniController extends BaseController
{

	public function prenotazioni(){
	//echo "sono passato da un redirect e dunque sono nel controller HOME";

		return view("/prenotazioni")
				->with("utente",Session::get("utente"));

	}

	public function caricamento(){
		$viaggi=DB::table('viaggi')
		->select ('viaggi.titolo','viaggi.immagine','viaggi.descrizione')
		->orderBy("viaggi.titolo")
		->get();
		return $viaggi;
	}



	public function ricerca($titolo){
		$titoli=viaggi::where('Nome','like','%'.$titolo.'%')->get();
		return $titoli;
	}

public function geo_API(){

		$api_key=env("GEO_APIKEY");
	$url = 'https://ipgeolocation.abstractapi.com/v1/?api_key='.$api_key;
		$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	$json = json_decode($result, true);
	curl_close($curl);

	echo json_encode($json);

}

public function covid_API(){
	$url = 'https://api.quarantine.country/api/v1/summary/region?region=';

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	$json = json_decode($result, true);
	curl_close($curl);


}



}

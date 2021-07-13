

function onResponse (response){
  return response.json();
}




function onJson(json) {
  console.log(json);
  let count=0;
  for(let i=0; i<json.length;i++){
    count++;
  }




    //1 CREAZIONE DIV CONT
    for(let i=0;i<json.length;i++) {
        const div_cont=document.createElement('div');
        div_cont.classList.add('cont');
        div_cont.dataset.ind=json[i].id;//segnalo i blocchi conte
        const struct= document.querySelector('.struttura');
        struct.appendChild(div_cont);
    }



    //2 creazione div head
    for(let i=0;i<json.length;i++) {
        const div_head= document.createElement('div');
        div_head.classList.add('head');

        const conte=document.querySelectorAll('.cont');
        conte[i].appendChild(div_head);
    }

    //3 creazione contenuto dinamico
    for (let i=0;i<json.length;i++) {
        const new_h1= document.createElement('h1');
        new_h1.textContent=json[i].titolo;
        const prefe = document.createElement('img');
        prefe.src = "http://localhost:8888/HW2/public/img/favorites.png";
        prefe.classList.add('prefe');
        /*prefe.addEventListener('click',Preferiti);*/

        const inte=document.querySelectorAll('.head');
        inte[i].appendChild(new_h1);
        inte[i].appendChild(prefe);

      const new_img=document.createElement('img');
      new_img.src="http://localhost:8888/HW2/public/img/"+json[i].immagine;





        const conte=document.querySelectorAll('.cont');
        conte[i].appendChild(new_img);

        const descr= document.createElement('p');
        descr.textContent= json[i].descrizione;
        descr.classList.add('hidden');
        conte[i].appendChild(descr);

        const testo=document.createElement('h3');
        testo.textContent="Leggi la descrizione";
        conte[i].appendChild(testo);


        const de=document.querySelectorAll('.struttura h3')
        for(descrizione of de){

        	descrizione.addEventListener('click',MostraDescrizione);
        }
    }
}



fetch('prenotazioni/view').then(onResponse).then (onJson);



function VisualizzaMeno(){
	event.currentTarget.textContent="Leggi la descrizione!";
	const mostra= event.currentTarget.parentNode.querySelector('p');
	mostra.classList.add('hidden');
	event.currentTarget.addEventListener('click',MostraDescrizione);
	event.currentTarget.removeEventListener('click', VisualizzaMeno);
}


function MostraDescrizione(){
	event.currentTarget.textContent="Mostra di meno!";
	const mostra= event.currentTarget.parentNode.querySelector('p');
	mostra.classList.remove('hidden');
	event.currentTarget.removeEventListener('click',MostraDescrizione);
	event.currentTarget.addEventListener('click', VisualizzaMeno);
}




// implementazione Preferiti

function viaggi(event) {
	event.currentTarget.src = "./immagini/meno.png";
	event.currentTarget.removeEventListener('click', Iscrizioni);
	event.currentTarget.addEventListener('click', Annulla);

	const viaggio = event.currentTarget.parentNode.querySelector('h1').textContent;
	const nome_viaggio = encodeURIComponent(viaggio);
	const aggiungi_viaggio = 'http://localhost/hw1/aggiungi_viaggio.php?nome_viaggio=' + nome_viaggio;
	console.log(aggiungi_viaggio);
	fetch(aggiungi_viaggio).then(seleziona_viaggio());
}

function onJSON2(json) {
	console.log(json);

	const iscrizioni = document.querySelector('#sez_prefe');

	if (json.length !== 0) {
		iscrizioni.classList.remove('hidden');
		iscrizioni.classList.add('flex');
	} else {
		iscrizioni.classList.add('hidden');
		iscrizioni.classList.remove('flex');
	}

	const contenuti = document.querySelector('#sez_prefe');
	contenuti.innerHTML = '';

	/*const corsi_iscritti = document.querySelector('.iscritti');
	corsi_iscritti.innerHTML = '';

	const iscritti = document.querySelector('.iscritti');
	const titolo = document.createElement('h1');
	titolo.textContent = "I tuoi vi"
	iscritti.appendChild(titolo);*/


	for (let i=0; i<json.length; i++) {

		const new_viaggio = document.createElement('div');
		new_viaggio.classList.add('cont');
		new_viaggio.dataset.indice = i;
		const new_struct = document.querySelector('#sez_prefe');
		new_struct.appendChild(new_viaggio);

		const new_titoloviaggio = document.createElement('div');
		new_titoloviaggio.classList.add('intestazione');
		const new_conte = document.querySelectorAll('.cont');
		new_conte[i].appendChild(new_titoloviaggio);

		const new_nome = document.createElement('h1');
		new_nome.textContent = json[i].nome_viaggio;
		const meno = document.createElement('img');
		meno.src = "http://localhost:8888/HW2/public/img/remove.jpg";
		meno.classList.add('plus');
		meno.addEventListener('click', Annulla);

		const new_intestazione = document.querySelectorAll('.intestazione');
		new_intestazione[i].appendChild(new_nome);
		new_intestazione[i].appendChild(meno);

		const new_immagine = document.createElement('img');
		new_immagine.src = json[i].immagine;
		new_conte[i].appendChild(new_immagine);

		const new_dettagli = document.createElement('p');
		new_dettagli.textContent = json[i].dettagli;
		new_dettagli.classList.add('hidden');
		new_dettagli.classList.remove('flex');
		new_conte[i].appendChild(new_dettagli);

		const new_testo = document.createElement('h3');
		new_testo.textContent = "leggi la descrizione";
		new_conte[i].appendChild(new_testo);
		new_testo.addEventListener('click', MostraDettagli);
	}
	//sincro();
}

function seleziona_iscrizioni() {
	fetch('http://localhost/hw1/seleziona_iscrizioni.php').then(onResponse).then(onJSON2);
}

function Annulla(event) {

	const riferimento = event.currentTarget.parentNode.parentNode.parentNode.parentNode;
	const iscrizioni = document.querySelector('#sez_prefe')

	if(riferimento === iscrizioni) {
		const icona_gruppo = document.querySelectorAll('.struttura .contenuto');
		const ind_iscrizioni = event.currentTarget.parentNode.parentNode.dataset.ind;
		const sinc = icona_gruppo[ind_iscrizioni-1].querySelector('img');
		sinc.src = "http://localhost:8888/HW2/public/img/favorites.png";
	}

	event.currentTarget.removeEventListener('click', Annulla);
	event.currentTarget.addEventListener('click', Iscrizioni);
	event.currentTarget.src = "http://localhost:8888/HW2/public/img/favorites.png";

	const corso = event.currentTarget.parentNode.querySelector('h1').textContent;
	const nome_corso = encodeURIComponent(corso);
	const svuota = 'http://localhost/hw1/elimina_iscrizioni.php?nome_corso='+ nome_corso;

	console.log(svuota);
	fetch(svuota).then(seleziona_iscrizioni());
}





//3- implementazione della barra di ricerca per trovare più velocemente le mete desiderate.


const barra=document.querySelector('header input');

barra.addEventListener('keyup',Barra_di_Ricerca);

//OK FUNZIONA
function Barra_di_Ricerca(event){
		const ricerca=event.currentTarget.value.toLowerCase();

		if (ricerca===''){
			const cont=document.querySelectorAll('.struttura .cont');

			for(contenitore of cont){
				contenitore.classList.remove('nascondi');
			}

		} else{
			const cont=document.querySelectorAll('.struttura .cont');
			console.log(cont);
			for (contenitore of cont) {
				contenitore.classList.add('nascondi');
			}
			console.log("La parola immessa in input è." + ricerca);
			for(let i=0;i<cont.length;i++){
			 const titolo=cont[i].querySelector('h1').textContent.toLowerCase();

			 if(titolo.indexOf(ricerca)!==-1){
					cont[i].classList.remove('nascondi');
			}
		}
	}
}

function onThumbnailClick(event){
	const image=document.createElement('img');
	image.src=event.currentTarget.src;
	document.body.classList.add('no-scroll');
	modalView.style.top=window.pageYOffset + 'px';
	modalView.appendChild(image);
	modalView.classList.remove('hidden');

}


//4- implementazione delle API

fetch("/geo_API").then(onResponseGeo).then(onJsonGeo);

function onResponseGeo(response){

  return response.json()


}

function onJsonGeo(json){
  console.log(json);


    const result3 = json.city;
    console.log(result3);
    const posizione = document.querySelector(".posizione");
    posizione.textContent = "CITTA':"+result3;


    const result4 = json.continent;
    console.log(result4);
    const continente = document.querySelector(".continente")
    continente.textContent = "CONTINENTE:"+result4;


    const result5 =json.ip_address;
    console.log(result5);
    const ip = document.querySelector(".ip")
    ip.textContent = "IP:"+result5;






  fetch("/covid_API").then(onResponsecovid).then(onjsoncovid);
}

const endpoint= 'https://api.quarantine.country/api/v1/summary/region?region=';

const form = document.querySelector(".DatiC")
form.addEventListener("submit", search)

function search (event){
  event.preventDefault()
  const content = document.querySelector("#CoronaV");
  const  value = content.value
  console.log('letto');

  if(!content){
    alert("Inserisci testo nella casella")
  }
  else{
    const text = encodeURIComponent(value)
    const request = endpoint + value;
    fetch(request).then(onResponsecovid).then(onjsoncovid)
  }
}



function onResponsecovid(response){
  return response.json()


}


function onjsoncovid(json){

    console.log(json);
     const result = json.data.summary.total_cases;
     console.log(result);
     const cases = document.querySelector("h3");
     cases.textContent= "CASI TOTALI:"+result;

     const result2= json.data.summary.deaths;
     console.log(result2);
     const deaths = document.querySelector("h4");
     deaths.textContent = "MORTI TOTALI:"+result2;


}

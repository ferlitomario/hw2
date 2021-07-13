<!DOCTYPE html>

<html>

<head>
    <link rel='stylesheet' href ="{{url("css/iscriviti.css")}}">
    <script src="{{url("js/iscriviti.js")}}" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.png">
    <meta charset="utf-8">

    <title>DICAM TOUR - Iscriviti</title>
</head>
<body>

    <main>
    <section class="main_left">
      <h1>DICAM TOUR</h1>
      <h4>AGENZIA DI VIAGGI<h4>
    </section>
  <section class='main_right'>
    		<div class='names' >
          <div class ='name'>
    					<h1>Registrati</h1>
              
              @if(isset($errore))
              <h2>{{$errore}} </h2>
              @endif


    			<form  name='signup' method='post' action='register'>
    				<input type='hidden' name='_token' value='{{$csrf_token}}'>
    			<div>	<label>Nome <input type='text' name='name'></label>
          <span>Nome strano</span>
        </div>
          <div>	<label>Cognome <input type='text' name='surname'></label>
          <span>Cognome strano</span>
        </div>
          <div>	<label>Nome Utente <input type='text' name='username'></label>
          <span>Nome utente non disponibile</span>
        </div>
    			<div>	<label>E-mail <input type='text' name='email'></label>
          <span>Indirizzo email non valido</span>
        </div>
    				<div><label>Password <input type='password' name='password'></label>
            <span>Inserisci almeno 8 caratteri</span>
          </div>
            <div><label>Conferma Password <input type='password' name='confirm_password'></label>
            <span>Le password non coincidono</span>
          </div>
    				<label>&nbsp; <input type='submit'></label>
    			</form>
    		<div>	<a href="login">Sei già registrato? Clicca qui per accedere</a></div>
    			<h4 class="hidden">Compila tutti i campi!</h4>
    			<h4 class="hidden">La password deve contenere almeno 6 e massimo 12 caratteri alfanumerici</h4>

    		</div>

    		<div class ="overlay"></div>

    		<h2><span></span></h2>

    </section>
    </main>
</body>

</html>

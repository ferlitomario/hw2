<!DOCTYPE html>
<html>


<head>
<meta charset="utf-8">
<title> LOGIN-DICAM TOUR </title>
<link rel ="stylesheet" href ="{{url("css/login.css")}}">
<script src="{{url("js/login.js")}}" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
      <main class="login">

        <section class = "main_left">
          <h1>DICAM TOUR</h1>
          <h4>AGENZIA DI VIAGGI<h4>

        </section>

        <section class = "main_right">
          <h1>BENVENUTO</h1>

      <form name='login' method ='post'>
        	<input type='hidden' name='_token' value='{{ $csrf_token ?? '' }}'>
@csrf
        <div class="username">
            <div><label for='username'>Nome utente o email</label></div>
            <div><input type='text' name='username' value='{{old('username')}}' </div>

        </div>

        <div class="password">
            <div><label for='password'>Password</label></div>
            <div><input type='password' name='password'></div>
        </div>

        <div class="remember">
            <div><input type='checkbox' name='remember' value="1" <?php if(isset($_POST["remember"])){echo $_POST["remember"] ? "checked" : "";} ?>></div>
            <div><label for='remember'>Ricorda l'accesso</label></div>
        </div>

        <div>
            <input type='submit' value="Accedi">
        </div>

        <div class ="Privacy">Effettuando l'accesso o creando un account accetti i Termini e le Condizioni e l’Informativa sulla Privacy</div>

    </form>


  <div class="signup">Non hai un account? <a href="{{ url("register")}}">Iscriviti</a>

</section>

</main>


</body>

</html>

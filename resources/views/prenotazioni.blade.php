<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Prenotazioni</title>
        <link rel="stylesheet" href="{{url("css/prenotazioni.css")}}">
        <script src={{url("js/ajax_contenuti.js")}} defer></script>


        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Signika:wght@300&display=swap" rel="stylesheet">


    </head>
    <body>

        <nav>
            <a href="home">HOME</a>
            <a>VIAGGI</a>
            <a>OFFERTE</a>
            <a>NEWS</a>
            <a class ="logout" href="{{url ("logout")}}">logout</a>
        </nav>

        <form class= "DatiC">
            <span class="Coronavirus">DATI-CORONAVIRUS IN TEMPO REALE(Ex.China,Italy,USA)</span> <input  type="text" id="CoronaV">
            <h3></h3>
            <h4></h4>

        </form>

        <article class="corpo1">
        <header>
            <h1>Cerca la tua destinazione preferita!</h1>
            <h1>Qui di seguito troverai tutte le nostre offerte per i viaggi e le tue destinazioni preferite</h1>
            <span>Cerca qui</span> <input type="text">
        </header>
        </article>
      </div>
        <article class="corpo2">
          <h1>Le tue destinazioni preferite sono:</h1>
            <section id="sez_prefe" class="hidden layout"></section>
            
            <div></div>
            </section>

            <section class="struttura">

            </section>


            <div class= "IP">
                <span class="geolocation">POSIZIONE DELL'UTENTE</span>
                <h2 class="posizione"></h2>
                <h2 class="continente"><h2>
                <h3 class="ip"></h3>

            </div>

        </article>
    </body>
</html>

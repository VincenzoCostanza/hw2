
@extends('layouts.layoutAltri')
@section('scripts')
        <link rel='stylesheet' href='{{ url("css/mhw1.css") }}'> 
        <script src='{{ url("js/home.js") }}' defer ></script>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
@endsection
@section('tasti')
    <div >
        <a href='{{ url("preferiti") }}' class='accesso_esci'>Preferiti</a>
        <div>
            @if(session('utente')!=null)
                <a href='{{ url("logout") }}' class='accesso_esci'> Logout</a>
            @else
                <a href='{{ url("login") }}' class='accesso_esci'> Accedi</a>
            @endif
        </div>
    </div>
@endsection

@section('bottoni_home')
    <div>    
        <a href='{{ url("partite_quot") }}' class="premi">Clicca qui per le partite del giorno</a>
        <a href='{{ url("info") }}' class="premi">Info giocatori e squadre</a>
        <a href='{{ url("competizioni") }}' class="premi">Competizioni</a>
    </div>
@endsection

@section('sezione')
<section>
            <section class='blocco_articoli'>        
            </section>
            <div id= "commenti" class="nasconditi">
                <div class='mod'>
                <div class="past_messages"></div>
                    <div class="comment_form">
                        <form name="scrivi_commenti">
                            <input type="text" name="commento" maxlength="254" placeholder="Scrivi un commento...">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div id='modale' class='nascosto'></div>   
        </section>                                 
        <footer>
        <strong>CalcisticaMente</strong></br></br>       
        <address>Sede centrale: Via Atenea,23 Agrigento</address>
       <p>Vincenzo Costanza O46002289</p>
    </footer>
@endsection
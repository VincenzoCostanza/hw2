@extends('layouts.form')
@section('scripts')
    <script src='{{ url("js/login.js") }}' defer ></script>
    <title>Calcisticamente - Accedi</title>
@endsection

@section('form')
<form name='login' method='post' >
                    <div id='__token'>
                        <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                    </div>
                    <div id='username'>
                        <label>Username<input type='text' name ='username' value='{{ $old_username }}'></label>
                        <span class='span nascondi'></span>
                    </div>
                    <div id='password'>
                        <label>Password<input type='password' name='password' ></label>
                        <span class='span nascondi'></span>
                    </div>
                    <div class='acesso_utente'>
                        <div class='clicca'>
                            <label>&nbsp; <input type='submit' value='Accedi' class='clicca'> </label>
                            <p id="campi_compila" class="errori nascondi"></p>
                            <p id='errore_credenziali' class="errori nascondi"> credenziali errate</p>
                            <p class='errori'>
                                @if(isset($error))
                                    {{ $error }}
                                @endif
                            </p>    
                        </div>
                    </div>    
                </form>
                <div class='NuovoProfilo'> Non hai un account?<a href='{{ url("registrazione") }}'>Registrati</a></div> 
@endsection





@extends('layouts.form')
@section('scripts')
    <script src='{{ url("js/registrazione.js") }}' defer ></script>
    <title>Calcisticamente - Registrati</title>
@endsection

@section('form')
    <form name='Registrazione' method='post'>
                    <div id='__token'>
                        <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                    </div>
                    <div id='nome'>
                        <label> Nome <input type='text' name='nome' value='{{ $old_nome }}'></label>
                        <span class='span nascondi'></span>
                    </div>
                    <div id='cognome'>
                        <label> Cognome <input type='text' name='cognome' value='{{ $old_cognome }}'></label>
                        <span class='span nascondi'></span>
                    </div>
                    <div id='username'>
                        <label> Username <input type='text' name='username' value='{{ $old_username }}'></label>
                        <span class='span nascondi'></span>
                    </div>
                    <div id='email'>
                        <label> E-mail <input type='text' name= 'email' value='{{ $old_email }}'></label>
                        <span class='span nascondi'></span>
                    </div>
                    <div id='password'>
                        <label> Password <input type='password' name='password' value='{{ $old_password }}'></label>
                        <span class='span nascondi'></span>
                    </div>
                    <label>&nbsp;<input type='submit' value='Invia'></label>
                    <p id='errore_username' class="errori nascondi"> username già in uso</p>
                    @if(isset($errori))
                        @foreach($errori as $errore)
                            <p class='errori'> {{ $errore }} </p>
                        @endforeach
                    @endif
    </form>
@endsection
@extends('layouts.layoutAltri')
@section('scripts')
        <link rel='stylesheet' href='{{ url("css/competizioni.css") }}'> 
        <script src='{{ url("js/competizioni.js") }}' defer ></script>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
@endsection
@section('tasti')
    <a href='{{ url("home") }}'>Torna alla Home</a>
@endsection

@section('sezione')
    <section class= 'prefe'>
        <div id= "x">
            <h1 class='compe'>Le maggiori competizioni europee:</h1>
        </div>
    <div id='flex-cont'></div>
@endsection
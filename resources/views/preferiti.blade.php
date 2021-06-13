
@extends('layouts.layoutAltri')
@section('scripts')
    <link rel='stylesheet' href='{{ url("css/info.css") }}'>
    <script src='{{ url("js/preferiti.js") }}' defer ></script>
@endsection
@section('tasti')
    <a href='{{ url("home") }}'>Torna alla Home</a>
@endsection

@section('sezione')
<section>
        <div class='blocco-esterno'>
                I tuoi preferiti:
        </div>
        <div class='contenitore'>
        </div>
    </section>
@endsection
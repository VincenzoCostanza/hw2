<html>
    <head>
    <link rel='stylesheet' href='{{ url("css/log.css") }}'>
        @section('scripts')
        @show
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <img src='{{ url("images/messi.jpg") }}' class='sfondo' ><img/>
        <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
        <meta charset = "utf-8">
    </head>
    <body>
    <h1 class='titolo'>
                <strong>CalcisticaMente</strong></br>
                <em>Tutto il bello del calcio </em>
            </h1>
            <nav>
            <a href= '{{ url("home") }}'>Torna alla Home</a>    
            </nav>
            <section>
                <div class='blocco-esterno'>
                    <div class='scrivi'>
                        <h1>Scrivi le tue credenziali</h1>
                    </div>
                    @yield('form')
                </div>
            </section>
    </body>
</html>
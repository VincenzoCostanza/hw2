<html>
<head>
    <meta name="viewport"
content="width=device-width, initial-scale=1">
    <meta charset = "utf-8">
    @section('scripts')
    @show
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">  
    <title>CalcisticaMente</title>
</head> 
<body>
    <header>
            <h1>
                <strong>CalcisticaMente</strong></br>
                <em>Tutto il bello del calcio </em>
            </h1>
            <nav id='menu'>
                    @yield('tasti')
            </nav>
            <nav class='bottoni'>
                    @yield('bottoni_home')        
            </nav>

    </header>
    @yield('sezione')
</body>
</html>

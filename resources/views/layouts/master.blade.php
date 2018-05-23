<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RomaProject</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.css">

    </head>

    <body>

        <div id="app">
            <div class="container">

                <section class="hero is-light is-bold">

                    <div class="hero-body">
                    
                        <div class="container">
                      
                            <h1 class="title">

                                Roma Projekt

                            </h1>
                        
                        </div>

                    </div>

                </section>
    
                <div class="columns">

                    <div class="column">

                        @include('layouts.navigation')

                    </div>

                    <div class="column">

                        <router-view></router-view>

                    </div>

                </div>


        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8SbeyQD5yjCcD6E3KINQWTAkDQaalxNs&libraries=places"></script>
        <script src="/js/app.js" type="text/javascript" charset="utf-8" async defer></script>

    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>

    @vite(['resources/css/app.css', 'resources/js/base.js','resources/css/accueil_alternative.css'])
</head>
<body>
    <div class = "my_wrapper">
        <article class="gauche">
          @include('base.sidebar')

        </article>

        <div class = "droite">
            @include('base.header')

            <main>
                @yield('main')                
            </main>
        </div>

    </div>

    <div class = "my_last_paragraphe"> </div>

    
    

   
</body>
</html>
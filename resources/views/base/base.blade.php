<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
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
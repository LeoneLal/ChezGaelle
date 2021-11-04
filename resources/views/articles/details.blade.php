<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>Chez Gaëlle</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{asset('images/LogoFondClair.png')}}" alt="logo">
            </a>
        </div>
        <div class="links">
            <ul>
            <li class="link"><a href="{{ route('index') }}">Accueil</a></li>
            <li class="link"><a href="{{ route('pictures.pictures') }}">Galerie</a></li>
            <li class="link active"><a href="{{ route('articles.news') }}">Actus</a></li>
            <!-- <li class="link">Infos complémentaires</li> -->
            </ul>
        </div>
    </header>
    <main class="brown-bg">
        <div class="py-12">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <img class="flex m-auto" src="{{ URL::to('/') }}/images/articles/{{ $article->picture_path }}">
                        <div class="show-details">
                            <p>{{ $article->title }}</p>
                            <div class="flex justify-between">
                                <p class="text-xs">Auteur : {{ $article->author }}</p>
                                <p class="text-xs">Mis à jour le {{ date_format($article->updated_at, "d/m/Y") }}</p>
                            </div>
                            <p>{{ $article->body }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>   
    <footer>
        <div class="hours">
            <h1>Horaires</h1>
            <div class="hourByDay">
                <p>Lundi - Jeudi : 7h00 - 21h00</p>
                <p>Vendredi : 7h00 - 22h00</p>
                <p>Samedi : 8h00 - 22h00</p>
                <p>Dimanche : 9h00 - 13h00</p>
            </div>
        </div>
        <div class="coordonees">
            <p><i class="fas fa-map-marker-alt"></i>12 Place de l'Église, 44520 Moisdon-la-Rivière</p>
            <p><i class="fas fa-phone-alt"></i>02 40 07 61 74</p>
        </div>
        <div class="social">
            <i class="fab fa-facebook"></i>
        </div>
    </footer> 
    <script src="https://kit.fontawesome.com/b927a11103.js" crossorigin="anonymous"></script>
</body>
</html>
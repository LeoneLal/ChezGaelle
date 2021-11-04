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
        <section class="galerie articles">
            <div class="lastArticles articles-gallery">
                @foreach($articles as $article)
                <div class="article articles-position">
                    <a href="{{ route('article.details',  $article->id) }}">
                    <img src="{{ URL::to('/') }}/images/articles/{{ $article->picture_path }}" alt="{{$article->title}}">
                    <div class="infos">
                        <div class="details">
                            <h3 class="title">{{ $article->title }}</h3>
                            <p class="small-text">{{ date('d/m/Y', strtotime($article->updated_at)) }}</p>
                        </div>
                        <p class="link"><i class="fas fa-link"></i></p>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
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
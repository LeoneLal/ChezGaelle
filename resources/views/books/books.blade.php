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
                <li class="link"><a href="{{ route('articles.news') }}">Actus</a></li>                
                <li class="link active"><a href="{{ route('books.books') }}">Livres</a></li>
                <!-- <li class="link">Infos complémentaires</li> -->
            </ul>
        </div>
    </header>
    <!-- Galerie côté clients -->
    <main class="brown-bg librairie">
        <h1 class="title">Notre sélection de livres</h1>
        <section class="window">
            <div class="lasts">
                <h2 class="title">Nos dernières sorties</h2>
                <img class="shelf" src="{{ URL::to('/') }}/images/etagere.png" alt="Etagère">
                <div class="container">
                    <div class="book last">
                        <img src="{{ URL::to('/') }}/images/books/{{ $lastBooks[0]->picture_path }}" alt="courveture livre">
                        <p>{{ $lastBooks[0]->author }} - {{ $lastBooks[0]->name }}</p>
                    </div>
                    <div class="book second">
                        <img src="{{ URL::to('/') }}/images/books/{{ $lastBooks[1]->picture_path }}" alt="courveture livre">
                        <p>{{ $lastBooks[1]->author }} - {{ $lastBooks[1]->name }}</p>
                    </div>
                    <div class="book third">
                        <img src="{{ URL::to('/') }}/images/books/{{ $lastBooks[2]->picture_path }}" alt="courveture livre">
                        <p>{{ $lastBooks[2]->author }} - {{ $lastBooks[2]->name }}</p>
                    </div>
                </div>

            </div>
                <h2 class="title">Tous nos livres</h2>
            <div class="books">
                @foreach($books as $book)
                <div class="book">
                    <img class="cover" src="{{ URL::to('/') }}/images/books/{{ $book->picture_path }}" alt="courveture livre">
                    <div class="infos">
                        <p>{{ $book->name }}</p>
                        <p>par {{ $book->author }}</p>
                    </div>
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
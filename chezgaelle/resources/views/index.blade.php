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
            <img src="{{asset('images/LogoFondClair.png')}}" alt="azertyu">
        </div>
        <div class="links">
            <ul>
            <li class="link active">Accueil</li>
            <li class="link">Galerie</li>
            <li class="link">Actus</li>
            <li class="link">Infos Complémentaires</li>
            </ul>
        </div>
    </header>
    <main>
    <section class="presentation">
        <div class="img">
        
        </div>
        <div class="chezgaelle">
        <h2>Chez Gaëlle</h2>
        <p class="text">
            {{$description->value}}
        </p>
        </div>
    </section>
    <section class="galerie photos">
        <h2>Dernières photos</h2>
        <div class="lastPictures">
            <div class="picture">
                    <img src="{{ asset('images/jeux.jpg') }}" alt="Saint Valentin">
                    <legend>Fevrier 2021</legend>
            </div>
            <div class="picture">
                    <img src="{{ asset('images/jeux.jpg') }}" alt="Saint Valentin">
                    <legend>Fevrier 2021</legend>
            </div>
            <div class="picture">
                    <img src="{{ asset('images/jeux.jpg') }}" alt="Saint Valentin">
                    <legend>Fevrier 2021</legend>
            </div>
        </div>
        <button>VOIR PLUS</button>
    </section>
    <section class="galerie articles">
        <h2>Derniers articles</h2>
        <div class="lastArticles">
            <div class="article">
                    <img src="{{ asset('images/jeux.jpg') }}" alt="Saint Valentin">
                    <div class="infos">
                        <div class="details">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="date">12/12/1212</p>
                        </div>
                        <p class="link"><i class="fas fa-link"></i></p>
                    </div>
            </div>
            <div class="article">
                    <img src="{{ asset('images/jeux.jpg') }}" alt="Saint Valentin">
                    <div class="infos">
                        <div class="details">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="date">12/12/1212</p>
                        </div>
                        <p class="link"><i class="fas fa-link"></i></p>
                    </div>
            </div>
            <div class="article">
                    <img src="{{ asset('images/jeux.jpg') }}" alt="Saint Valentin">
                    <div class="infos">
                        <div class="details">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="date">12/12/1212</p>
                        </div>
                        <p class="link"><i class="fas fa-link"></i></p>
                    </div>
            </div>
        </div>
        <button>VOIR PLUS</button>
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
            <p><i class="fas fa-map-marker-alt"></i> 12 place de l'église 44520 Moisdon la rivière</p>
            <p><i class="fas fa-phone-alt"></i> 02 40 07 61 74</p>
        </div>
    </footer> 
    <script src="https://kit.fontawesome.com/b927a11103.js" crossorigin="anonymous"></script>
</body>
</html>
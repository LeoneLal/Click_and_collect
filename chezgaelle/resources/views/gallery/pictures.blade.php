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
            <img src="{{asset('images/LogoFondClair.png')}}" alt="logo">
        </div>
        <div class="links">
            <ul>
            <li class="link"><a href="{{ route('index') }}">Accueil</a></li>
            <li class="link active"><a href="{{ route('gallery.pictures') }}">Galerie</a></li>
            <li class="link">Actus</li>
            <li class="link">Infos complémentaires</li>
            </ul>
        </div>
    </header>
    <main>
        <div class="pictures">
            @foreach($pictures as $picture)
            <div class="picture">
                <img src="{{ URL::to('/') }}/images/gallery/{{ $picture->picture_slug }}">
                <div class="">
                    <p>{{ $picture->description }}</p>
                    <p class="small-text">{{ date('d/m/Y', strtotime($picture->updated_at)) }}</p>
                </div>
            </div>
            @endforeach
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
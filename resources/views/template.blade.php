<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/gantThanos.css') !!}
    <title>@yield('titrePage')</title>
    <script type="text/javascript">

        function miseEnAttente(element)
        {
            setTimeout(reinitgant, 2600); //On attend 1 sec avant d'exécuter la fonction

        }

        function reinitgant(element)
        {
            var x = document.getElementById("gant");
            var v = "../images/gant.png";

            x.setAttribute("src", v);
        }
        function snap(element)
        {
            var v = "../images/snap.gif";

            element.setAttribute("src", v);
            miseEnAttente(element);

        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a  href="{{url('/')}}" ><img class="logo-gant" src="{{url('../images/logo_gant.png') }}"></a>
        <a class="navbar-brand" href="{{url('/')}}">Gant Thanos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="listePersonnes">Liste des Personnes
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="statistiques">Statistiques
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Bienvenue,  {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Se connecter
                        </a>

                    </li>
                @endauth


            </ul>
        </div>
    </div>
</nav>
<header>
    <h1>@yield('titreItem')</h1>
</header>
@yield('contenu')

<footer class="footer">
    <p>Petite page web créée par DA COSTA Rémi et POUX-BERTHE Maxime mettant pour connaître votre sort suite au snap de Thanos</p>
</footer>
{!! Html::script('lib/jquery/jquery-3.3.1.slim.min.js') !!}
{!! Html::script('lib/js/bootstrap.bundle.js') !!}
{!! Html::script('lib/js/bootstrap.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')!!}
</body>
</html>
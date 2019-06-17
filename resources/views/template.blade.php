<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/gantThanos.css') !!}
    <title>@yield('titrePage')</title>
</head>
<body>
<header>
    <h1>@yield('titreItem')</h1>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a  href="{{url('/')}}" ><img class="logo-gant" src="{{url('../images/logo_gant.png') }}"></a>
        <a class="navbar-brand" id="titre_site" href="{{url('/')}}">Gant de Thanos</a>
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
                @auth
                    <li class="nav-item active">
                        <a class="nav-link" href="statistiques">Statistiques</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endauth


            </ul>
        </div>
    </div>
</nav>
@yield('contenu')

<!-- Footer -->
<footer class="page-footer font-small teal pt-4">

    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">Contexte</h5>
                <p>Thanos est un méchant de l'univers MARVEL. Dans les films et les livres, Thanos
                a pour but de réunir les 6 pierres d'infinité. Ces pierres donnent à leur porteur
                un pouvoir égal à celui des dieux. Une fois en possession de ces pierres, Thanos utilisa un gant magique
                et eu pour souhait celui d'eliminer LA MOITIE DE L'UNIVERS (de manière impartiale).</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-6 mb-md-0 mb-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">Réalisation</h5>
                <p>Nous sommes 2 élèves en 1ère année du cursus ingénieur informatique à Polytech Lyon.
                Nous avons réalisé un site internet qui permet de connaître la sentence de toutes
                les personnes qui renseigneront leur identité dans le formulaire. Suite à cela,
                il suffira d'utiliser el gant pour connaître le verdict.</p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Text -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

{!! Html::script('lib/jquery/jquery-3.3.1.slim.min.js') !!}
{!! Html::script('lib/js/bootstrap.bundle.js') !!}
{!! Html::script('lib/js/bootstrap.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')!!}
{!! Html::script('lib/js/html2canvas.min.js') !!}
{!! Html::script('lib/js/chance.min.js') !!}
{!! Html::script('lib/jquery/jquery-3.4.1.min.js') !!}
{!! Html::script('lib/jquery/jquery-ui-1.9.2.custom.min.js') !!}

<script type="text/javascript">

    function miseEnAttente(element)
    {
        setTimeout(reinitgant, 2600); //2600
        setTimeout(submitForm, 2700);
        setTimeout(jouerSonSnap, 500);
    }

    function submitForm()
    {
        var form = document.getElementById('form_ajout');

        form.submit();
        form.reset();
    }

    function reinitgant(element)
    {
        var x = document.getElementById("gant");
        var v = "../images/gant.png";

        x.setAttribute("src", v);
    }

    function jouerSonSnap()
    {
        var player = document.querySelector('#audioSnap');
        player.play();
    }

    function snap(element)
    {
        if(element.getAttribute("src") == "{{ url('../images/gant.png')  }}")
        {
            var v = "../images/snap.gif";
            element.setAttribute("src", v);
            miseEnAttente(element);
        }
    }
</script>
</body>
</html>

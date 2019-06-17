<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/gantThanos.css') !!}
    <title>@yield('titrePage')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a  href="{{url('/')}}" ><img class="logo-gant" src="{{url('../images/logo_gant.png') }}"></a>
        <a class="navbar-brand" id="titre_site" href="{{url('/')}}">Gant Thanos</a>
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
<header>
    <h1>@yield('titreItem')</h1>
</header>
@yield('contenu')

<!-- Footer -->

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

    var imageDataArray = [];
    var canvasCount = 35;
    function disparition()
    {
        var gantfixe = document.getElementById("gant");
        html2canvas(gantfixe).then(canvas => {
            //capture all div data as image
            ctx = canvas.getContext("2d");
            var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            var pixelArr = imageData.data;
            createBlankImageData(imageData);
            //put pixel info to imageDataArray (Weighted Distributed)
            for (let i = 0; i < pixelArr.length; i+=4) {
                //find the highest probability canvas the pixel should be in
                let p = Math.floor((i/pixelArr.length) *canvasCount);
                let a = imageDataArray[weightedRandomDistrib(p)];
                a[i] = pixelArr[i];
                a[i+1] = pixelArr[i+1];
                a[i+2] = pixelArr[i+2];
                a[i+3] = pixelArr[i+3];
            }
            //create canvas for each imageData and append to target element
            for (let i = 0; i < canvasCount; i++) {
                let c = newCanvasFromImageData(imageDataArray[i], canvas.width, canvas.height);
                c.classList.add("dust");
                $(".content").append(c);
            }

            //clear all children except the canvas
            $(".content").children().not(".dust").fadeOut(3500);
            //apply animation
            $(".dust").each( function(index){
                animateBlur($(this),0.8,800);
                setTimeout(() => {
                    animateTransform($(this),100,-100,chance.integer({ min: -15, max: 15 }),800+(110*index));
                }, 70*index);
                //remove the canvas from DOM tree when faded
                $(this).delay(70*index).fadeOut((110*index)+800,"easeInQuint",()=> {$( this ).remove();});
            });
        });
    }

    function weightedRandomDistrib(peak)
    {
        var prob = [], seq = [];
        for(let i=0;i<canvasCount;i++) {
            prob.push(Math.pow(canvasCount-Math.abs(peak-i),3));
            seq.push(i);
        }
        return chance.weighted(seq, prob);
    }

    function animateBlur(elem,radius,duration)
    {
        var r =0;
        $({rad:0}).animate({rad:radius}, {
            duration: duration,
            easing: "easeOutQuad",
            step: function(now) {
                elem.css({
                    filter: 'blur(' + now + 'px)'
                });
            }
        });
    }

    function animateTransform(elem,sx,sy,angle,duration)
    {
        var td = tx = ty =0;
        $({x: 0, y:0, deg:0}).animate({x: sx, y:sy, deg:angle}, {
            duration: duration,
            easing: "easeInQuad",
            step: function(now, fx) {
                if (fx.prop == "x")
                    tx = now;
                else if (fx.prop == "y")
                    ty = now;
                else if (fx.prop == "deg")
                    td = now;
                elem.css({
                    transform: 'rotate(' + td + 'deg)' + 'translate(' + tx + 'px,'+ ty +'px)'
                });
            }
        });
    }

    function createBlankImageData(imageData)
    {
        for(let i=0;i<canvasCount;i++)
        {
            let arr = new Uint8ClampedArray(imageData.data);
            for (let j = 0; j < arr.length; j++) {
                arr[j] = 0;
            }
            imageDataArray.push(arr);
        }
    }

    function newCanvasFromImageData(imageDataArray ,w , h)
    {
        var canvas = document.createElement('canvas');
        canvas.width = w;
        canvas.height = h;
        tempCtx = canvas.getContext("2d");
        tempCtx.putImageData(new ImageData(imageDataArray, w , h), 0, 0);

        return canvas;
    }

    function miseEnAttente(element)
    {
        setTimeout(reinitgant, 2600); //2600
        setTimeout(submitForm, 10000);
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

        disparition();
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

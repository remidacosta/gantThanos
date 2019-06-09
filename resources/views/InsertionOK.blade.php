@extends('template')

@section('titrePage')
    Page d'accueil
@endsection

@section('contenu')
<?php
    if($resultatSnap == "Mort")
    {
        if($sexe == "F")
            {
        ?>
                <center><h1 class = "notif_insertion">Vous etes morte</h1></center>
                <center><img src="{{url('../images/thanos_mechant.jpg') }}" ></center>
<?php
            }
        else
            {
                ?>
                <center><h1 class = "notif_insertion">Vous etes mort</h1></center>
                <center><img src="{{url('../images/thanos_mechant.jpg') }}" ></center>
<?php
            }
    }
    else if($resultatSnap == "Vivant")
    {
        if($sexe == "F")
            {
        ?>
                <center><h1 class = "notif_insertion">Vous etes vivante</h1></center>
                <center><img src="{{url('../images/thanos_cool.jpg') }}" ></center>
<?php
            }
        else
            {
                ?>
                <center><h1 class = "notif_insertion">Vous etes mort</h1></center>
                <center><img src="{{url('../images/thanos_mechant.jpg') }}" ></center>
<?php
            }
    }
    else
        {
            ?>
        <center><h1 class = "notif_insertion">Vous avez deja eu votre sentence !!</h1></center>
        <center><img src="{{url('../images/thanos_neutre.jpg') }}" ></center>
<?php
        }

?>


@endsection
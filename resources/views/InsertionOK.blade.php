<?php
    if($resultatSnap == "Mort")
    {
        ?>
        <h1>Vous êtes mort</h1>
<?php
    }
    else if($resultatSnap == "Vivant")
        {
            ?>
        <h1>Vous êtes vivant</h1>
<?php
        }
?>

{!! Form::open(['url' => 'ajoutPersonne']) !!}
{!! Form::submit('Ajouter une autre personne', ['class' => 'btn btn-info pull-right']) !!}
{!! Form::close() !!}

{!! Form::open(['url' => 'listePersonnes']) !!}
{!! Form::submit('Afficher la liste des gens', ['class' => 'btn btn-info pull-right']) !!}
{!! Form::close() !!}


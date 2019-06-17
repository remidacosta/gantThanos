@extends('template')

@section('titrePage')
    Liste des personnes
@endsection

@section('contenu')
<table class="table table-bordered table-stripped">
    <thead>
    <th>Id</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Date Naissance</th>
    <th>Nationalite</th>
    <th>Etat</th>
    <th>Sexe</th>
    </thead>
    @foreach ($lesPersonnes as $personne)
        <tr>
            <td>{{ $personne->getId() }}</td>
            <td>{{ $personne->getNom() }}</td>
            <td>{{ $personne->getPrenom() }}</td>
            <td>{{ $personne->getDateNaissance() }}</td>
            <td>{{ $personne->getNationalite() }}</td>
            <td>{{ $personne->getEtat() }}</td>
            <td>{{ $personne->getSexe() }}</td>

            @auth
            <td>
                {!! Form::open(['url' => 'modifierPersonne/'.$personne->getId().'', 'method' => 'get']) !!}
                {!! Form::submit('Modifier', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </td>

            <td>
                {!! Form::open(['url' => 'supprimerPersonne/'.$personne->getId()]) !!}
                {!! Form::submit('Supprimer', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </td>
            @endauth
        </tr>
    @endforeach
    {!! Form::open(['url' => 'ajoutPersonne']) !!}
    {!! Form::submit('Ajouter', ['class' => 'btn btn-info pull-right']) !!}
    {!! Form::close() !!}
</table>
@endsection

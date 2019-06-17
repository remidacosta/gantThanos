@extends('template')

@section('titrePage')
    Statistiques
@endsection

@section('contenu')
    <table class="table table-bordered table-stripped">
        <thead>
        <th>Nationalite</th>
        <th>Pourcentage des individus de sexe masculin décédés</th>
        <th>Pourcentage des individus de sexe féminin décédés</th>
        <th>Pourcentage des individus de sexe autre décédés</th>
        </thead>
        @foreach ($lesStatistiques as $statistique)
            <tr>
                <td>{{ $statistique->getNationalite() }}</td>
                <td>{{ $statistique->getPourcentageHommesMorts() }}</td>
                <td>{{ $statistique->getPourcentageFemmesMortes() }}</td>
                <td>{{ $statistique->getPourcentageAutresMorts() }}</td>
            </tr>
        @endforeach

    </table>
    <h2>Tranche d'âge des décédés (en pourcentage)</h2>
    <table>
        <thead>
        <th>Nationalite</th>
        <th>De 0 à 10 ans</th>
        <th>De 10 à 20 ans</th>
        <th>De 20 à 30 ans</th>
        <th>De 30 à 40 ans</th>
        <th>De 40 à 50 ans</th>
        <th>De 50 à 60 ans</th>
        <th>De 60 à 70 ans</th>
        <th>De 70 à 80 ans</th>
        <th>De 80 à 90 ans</th>
        <th>De 90 à 100 ans</th>
        <th>Plus de 100 ans</th>
        </thead>
        @foreach ($lesStatistiques as $statistique)
            <tr>
                <td>{{ $statistique->getNationalite() }}</td>
                <td>{{ $statistique->getMoins10() }}</td>
                <td>{{ $statistique->getDe10a20() }}</td>
                <td>{{ $statistique->getDe20a30() }}</td>
                <td>{{ $statistique->getDe30a40() }}</td>
                <td>{{ $statistique->getDe40a50() }}</td>
                <td>{{ $statistique->getDe50a60() }}</td>
                <td>{{ $statistique->getDe60a70() }}</td>
                <td>{{ $statistique->getDe70a80() }}</td>
                <td>{{ $statistique->getDe80a90() }}</td>
                <td>{{ $statistique->getDe90a100() }}</td>
                <td>{{ $statistique->getPlus100() }}</td>
            </tr>
        @endforeach
    </table>
@endsection

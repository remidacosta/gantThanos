@extends('template')

@section('titrePage')
    Statistiques
@endsection

@section('contenu')
    <table class="table table-bordered table-stripped">
        <thead>
        <th>Nationalite</th>
        <th>Pourcentage des individus de sexe masculins décédés</th>
        <th>Pourcentage des individus de sexe féminins décédés</th>
        </thead>
        @foreach ($lesStatistiques as $statistique)
            <tr>
                <td>{{ $statistique->getNationalite() }}</td>
                <td>{{ $statistique->getPourcentageHommesMorts() }}</td>
                <td>{{ $statistique->getPourcentageFemmesMortes() }}</td>
            </tr>
        @endforeach
    </table>
@endsection

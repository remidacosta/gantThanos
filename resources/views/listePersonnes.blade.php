<table class="table table-bordered table-stripped">
    <thead>
    <th>Id</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Date Naissance</th>
    <th>Nationalite</th>
    <th>Sexe</th>
    </thead>
    @foreach ($lesPersonnes as $personne)
        <tr>
            <td>{{ $personne->getId() }}</td>
            <td>{{ $personne->getNom() }}</td>
            <td>{{ $personne->getPrenom() }}</td>
            <td>{{ $personne->getDateNaissance() }}</td>
            <td>{{ $personne->getNationalite() }}</td>
            <td>{{ $personne->getSexe() }}</td>
        </tr>
    @endforeach
</table>

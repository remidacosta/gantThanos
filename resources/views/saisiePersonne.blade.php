    <h1>Ajouter une Personne</h1>

    <div class="col-sm-offset-3 col-sm-6">
        <div class="card">
            <div class="card-header">Renseigner les attributs suivants : </div>
            <div class="card-body">
                {!! Form::open(['url' => 'insertionPersonne']) !!}
                <div class="form-group {!! $errors->has('Nom') ? 'has-error' : '' !!}">
                    {!! Form::text('Nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                    {!! $errors->first('Nom', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('Prenom') ? 'has-error' : '' !!}">
                    {!! Form::text('Prenom', null, ['class' => 'form-control', 'placeholder' => 'Prenom']) !!}
                    {!! $errors->first('Prenom', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('Sexe') ? 'has-error' : '' !!}">
                    {!! Form::radio('Sexe', 'M') !!} Homme
                    {!! $errors->first('Sexe', '<small class="help-block">:message</small>') !!}
                    {!! Form::radio('Sexe', 'F') !!} Femme
                    {!! $errors->first('Sexe', '<small class="help-block">:message</small>') !!}
                    {!! Form::radio('Sexe', 'A') !!} Autre
                    {!! $errors->first('Sexe', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('Nationalite') ? 'has-error' : '' !!}">
                    {!! Form::text('Nationalite', null, ['class' => 'form-control', 'placeholder' => 'Nationalite']) !!}
                    {!! $errors->first('Nationalite', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('DateNaissance') ? 'has-error' : '' !!}">
                    {!! Form::date('DateNaissance', null, ['class' => 'form-control', 'placeholder' => 'DateNaissance']) !!}
                    {!! $errors->first('DateNaissance', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <p></p>
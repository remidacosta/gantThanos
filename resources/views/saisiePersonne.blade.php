<audio id="audioSnap">
    <source src="../musiques/thanos-snap-sound.mp3">
</audio>

<h1>Tester le gant de Thanos</h1>

    <div class="col-sm-offset-3 col-sm-6">
        <div class="card">
            <div class="card-header">Renseigner les attributs suivants : </div>
            <div class="card-body">
                {!! Form::open(['url' => 'insertionPersonne', 'id' => 'form_ajout']) !!}
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

                    {!! Form::select('Nationalite',array('Terre'=>'Terre','Asgard'=>'Asgard','Xandar'=>'Xandar','Vormir'=>'Vormir','Titan'=>'Titan','Sakaar'=>'Sakaar','Hala'=>'Hala','Ego'=>'Ego','Jotunheim'=>'Jotunheim') ,['class'=>'form-control']) !!} Nationalité (planète)
                    {!! $errors->first('Nationalite', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('DateNaissance') ? 'has-error' : '' !!}">
                    Date de naissance{!! Form::date('DateNaissance', null, ['class' => 'form-control', 'placeholder' => 'DateNaissance']) !!}
                    {!! $errors->first('DateNaissance', '<small class="help-block">:message</small>') !!}
                </div>

                <div class="content">
                    <center> <img  id="gant" src="{{url('../images/gant.png') }}" onclick="snap(this); " ></center>
                </div>

            </div>
        </div>
    </div>
    <p></p>
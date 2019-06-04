@extends('template')

@section('titrePage')
    Page d'accueil
@endsection


@section('contenu')
    <center> <img  id="gant" src="{{url('../images/gant.png') }}" onclick="snap(this); " ></center>
    <center>  @include('saisiePersonne')  </center>
@endsection
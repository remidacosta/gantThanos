<?php

namespace App\Http\Controllers;
use App\Http\Requests\InsertionConfRequest;
use App\Modeles\PersonneDAO;
use App\Metier\Personne;

// use Illuminate\Http\Request;

class PersonneController extends Controller
{
    //
    public function getLesPersonnes()
    {
        $personne = new PersonneDAO();
        $lesPersonnes = $personne->getLesPersonnes();

        return view('listePersonnes', compact( 'lesPersonnes'));
    }

    public function ajoutPersonne()
    {
        return view('saisiePersonne');
    }


    public function postAjoutPersonne(InsertionConfRequest $request)
    {
        $maPersonne = new PersonneDAO();
        $unePersonne = new Personne();

        $unePersonne->setNom($request->input('Nom'));
        $unePersonne->setPrenom($request->input('Prenom'));
        $unePersonne->setSexe($request->get('Sexe'));
        $unePersonne->setNationalite($request->input('Nationalite'));
        $unePersonne->setDateNaissance($request->input('DateNaissance'));
        $unePersonne->setEtat($this->snap());

        $maPersonne->creationPersonne($unePersonne);

        $lesPersonnes = $maPersonne->getLesPersonnes();

        return view('listePersonnes', compact( 'lesPersonnes'));
    }

    private function snap()
    {
        $choix = rand(0,1);
        if($choix == 0)
        {
            return "Mort";
        }
        else if($choix == 1)
        {
            return "Vivant";
        }
    }
}

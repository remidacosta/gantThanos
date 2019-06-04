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
        return view('index');
    }

    public function supprimerPersonne($n)
    {
        $personnes = new PersonneDAO();
        $unepersonne = $personnes->getPersonneById($n);
        $personnes->supprimerPersonne($unepersonne);
        $lesPersonnes=$personnes->getLesPersonnes();
        return view('listePersonnes', compact( 'lesPersonnes'));
    }

    public function modifierPersonne($n)
    {
        $personnes = new PersonneDAO();
        $unepersonne = $personnes->getPersonneById($n);
        return view('modifierPersonne', compact('unepersonne'));
    }

    public function postModifierPersonne(InsertionConfRequest $request, $n)
    {
        $personnes = new PersonneDAO();
        $unepersonne = $personnes->getPersonneById($n);
        $unepersonne->setNom($request->input('Nom'));
        $unepersonne->setPrenom($request->input('Prenom'));
        $unepersonne->setSexe($request->get('Sexe'));
        $unepersonne->setNationalite($request->input('Nationalite'));
        $unepersonne->setDateNaissance($request->input('DateNaissance'));
        $personnes->modifierPersonne($unepersonne);
        $lesPersonnes=$personnes->getLesPersonnes();
        return view('listePersonnes', compact( 'lesPersonnes'));
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

        if(!$maPersonne->verifDoublon($unePersonne))
        {
            $unePersonne->setEtat($this->snap());
            $maPersonne->creationPersonne($unePersonne);
        }
        
        $resultatSnap = $unePersonne->getEtat();

        return view('InsertionOK', compact( 'resultatSnap'));
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

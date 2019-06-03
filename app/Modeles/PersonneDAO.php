<?php

namespace App\Modeles;
use DB;
use App\Metier\Personne;

class PersonneDAO extends DAO
{

    public function getLesPersonnes()
    {
        $personnes = DB::table('personne')->get();
        $lesPersonnes = array();
        foreach ($personnes as $unepersonne)
        {
            $id = $unepersonne->Identifiant;
            $lesPersonnes[$id] = $this->creerObjetMetier($unepersonne);
        }
        return $lesPersonnes;
    }

    public function getPersonneById($id)
    {
        $unepersonne = DB::table('personne')->where('Identifiant', '=', $id)->first();
        $personne = $this->creerObjetMetier($unepersonne);

        return $personne;
    }

    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        $maPersonne = new Personne();

        $maPersonne->setId($objet->Identifiant);
        $maPersonne->setNom($objet->Nom);
        $maPersonne->setPrenom($objet->Prenom);
        $maPersonne->setSexe($objet->Sexe);
        $maPersonne->setNationalite($objet->Nationalite);
        $maPersonne->setEtat($objet->Etat);
        $maPersonne->setDateNaissance($objet->DateNaissance);

        return $maPersonne;
    }

    public function creationPersonne(Personne $personne)
    {
        DB::table('personne')->insert(['Identifiant'=>$personne->getId(),'Nom'=>$personne->getNom(),
            'Prenom'=>$personne->getPrenom(),'Sexe'=>$personne->getSexe(),'Nationalite'=>$personne->getNationalite(),
            'Etat'=>$personne->getEtat(),'DateNaissance'=>$personne->getDateNaissance()]);
    }
}
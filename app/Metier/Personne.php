<?php

namespace App\Metier;
use DB;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    private $id;
    private $nom;
    private $prenom;
    private $sexe;
    private $nationalite;
    private $dateNaissance;


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function getNationalite()
    {
        return $this->nationalite;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }
}

<?php

namespace App\Metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Statistiques extends Model
{
    private $pourcentageHommesMorts;
    private $pourcentageFemmesMortes;
    private $nationalite;

    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    public function getNationalite()
    {
        return $this->nationalite;
    }

    public function setPourcentageHommesMorts($pourcentageHommesMorts)
    {
        $this->pourcentageHommesMorts = $pourcentageHommesMorts;
    }

    public function getPourcentageHommesMorts()
    {
        return $this->pourcentageHommesMorts;
    }

    public function setPourcentageFemmesMortes($pourcentageFemmesMortes)
    {
        $this->pourcentageFemmesMortes = $pourcentageFemmesMortes;
    }

    public function getPourcentageFemmesMortes()
    {
        return $this->pourcentageFemmesMortes;
    }

}

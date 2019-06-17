<?php

namespace App\Metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Statistiques extends Model
{
    private $pourcentageHommesMorts;
    private $pourcentageAutresMorts;
    private $pourcentageFemmesMortes;
    private $nationalite;
    private $moins10;
    private $plus100;
    private $de10a20;
    private $de20a30;
    private $de30a40;
    private $de40a50;
    private $de50a60;
    private $de60a70;
    private $de70a80;
    private $de80a90;
    private $de90a100;

    /**
     * @return mixed
     */
    public function getDe10a20()
    {
        return $this->de10a20;
    }

    /**
     * @param mixed $de10a20
     */
    public function setDe10a20($de10a20): void
    {
        $this->de10a20 = $de10a20;
    }

    /**
     * @return mixed
     */
    public function getDe20a30()
    {
        return $this->de20a30;
    }

    /**
     * @param mixed $de20a30
     */
    public function setDe20a30($de20a30): void
    {
        $this->de20a30 = $de20a30;
    }

    /**
     * @return mixed
     */
    public function getDe30a40()
    {
        return $this->de30a40;
    }

    /**
     * @param mixed $de30a40
     */
    public function setDe30a40($de30a40): void
    {
        $this->de30a40 = $de30a40;
    }

    /**
     * @return mixed
     */
    public function getDe40a50()
    {
        return $this->de40a50;
    }

    /**
     * @param mixed $de40a50
     */
    public function setDe40a50($de40a50): void
    {
        $this->de40a50 = $de40a50;
    }

    /**
     * @return mixed
     */
    public function getDe50a60()
    {
        return $this->de50a60;
    }

    /**
     * @param mixed $de50a60
     */
    public function setDe50a60($de50a60): void
    {
        $this->de50a60 = $de50a60;
    }

    /**
     * @return mixed
     */
    public function getDe60a70()
    {
        return $this->de60a70;
    }

    /**
     * @param mixed $de60a70
     */
    public function setDe60a70($de60a70): void
    {
        $this->de60a70 = $de60a70;
    }

    /**
     * @return mixed
     */
    public function getDe70a80()
    {
        return $this->de70a80;
    }

    /**
     * @param mixed $de70a80
     */
    public function setDe70a80($de70a80): void
    {
        $this->de70a80 = $de70a80;
    }

    /**
     * @return mixed
     */
    public function getDe80a90()
    {
        return $this->de80a90;
    }

    /**
     * @param mixed $de80a90
     */
    public function setDe80a90($de80a90): void
    {
        $this->de80a90 = $de80a90;
    }

    /**
     * @return mixed
     */
    public function getDe90a100()
    {
        return $this->de90a100;
    }

    /**
     * @param mixed $de90a100
     */
    public function setDe90a100($de90a100): void
    {
        $this->de90a100 = $de90a100;
    }

    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    public function getNationalite()
    {
        return $this->nationalite;
    }

    public function setMoins10($moins10)
    {
        $this->moins10 = $moins10;
    }

    public function getMoins10()
    {
        return $this->moins10;
    }

    public function setPlus100($plus100)
    {
        $this->plus100 = $plus100;
    }

    public function getPlus100()
    {
        return $this->plus100;
    }

    public function setPourcentageHommesMorts($pourcentageHommesMorts)
    {
        $this->pourcentageHommesMorts = $pourcentageHommesMorts;
    }

    public function getPourcentageHommesMorts()
    {
        return $this->pourcentageHommesMorts;
    }

    public function setPourcentageAutresMorts($pourcentageAutresMorts)
    {
        $this->pourcentageAutresMorts = $pourcentageAutresMorts;
    }

    public function getPourcentageAutresMorts()
    {
        return $this->pourcentageAutresMorts;
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

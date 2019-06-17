<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Metier\Statistiques;

class StatistiquesDAO extends Model
{
    public function getLesStatistiques()
    {
        $nationalites = DB::table('personne')->pluck('Nationalite');
        $lesStatistiques = array();
        $id=0;
        foreach ($nationalites as $nationalite)
        {
            $id = $id+1;
            $maStat=new Statistiques();
            $nbM=DB::table('personne')
                ->where('Nationalite', $nationalite)
                ->where('Sexe', 'M')
                ->count();
            if($nbM>0) {
                $maStat->setPourcentageHommesMorts((100*DB::table('personne')
                        ->where('Nationalite', $nationalite)
                        ->where('Etat', 'Mort')
                        ->where('Sexe', 'M')
                        ->count())
                    / $nbM);
            }
            else
                $maStat->setPourcentageHommesMorts("Non défini");
            $nbF=DB::table('personne')->where('Nationalite', $nationalite)->where('Sexe', 'F')->count();
            if($nbF>0) {
                $maStat->setPourcentageFemmesMortes(100*(DB::table('personne')
                        ->where('Nationalite', $nationalite)
                        ->where('Etat', 'Mort')
                        ->where('Sexe', 'F')
                        ->count())
                    / $nbF);
            }
            else
                $maStat->setPourcentageFemmesMortes("Non défini");
            $maStat->setNationalite($nationalite);
            $lesStatistiques[$id] = $maStat;
        }
        return $lesStatistiques;
    }

    public function getStatistiquesByNationalite($nationalite)
    {
        $unestat = DB::table('personne')->where('Identifiant', '=', $id)->first();
        $statistique = $this->creerObjetMetier($unestat);

        return $statistique;
    }

    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        $maStat = new Statistiques();
        $maStat->setPourcentageHommesMorts($objet->pourcentageHommesMorts);
        $maStat->setPourcentageFemmesMorts($objet->pourcentageFemmesMortes);
        $maStat->setNationalite($objet->Nationalite);

        return $maStat;
    }
}

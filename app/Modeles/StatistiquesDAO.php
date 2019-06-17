<?php

namespace App\Modeles;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Metier\Statistiques;


class StatistiquesDAO extends Model
{
    public function getLesStatistiques()
    {
        $nationalites = DB::table('personne')->distinct()->pluck('Nationalite');
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
            $nbA=DB::table('personne')->where('Nationalite', $nationalite)->where('Sexe', 'A')->count();
            if($nbA>0) {
                $maStat->setPourcentageAutresMorts(100*(DB::table('personne')
                        ->where('Nationalite', $nationalite)
                        ->where('Etat', 'Mort')
                        ->where('Sexe', 'A')
                        ->count())
                    / $nbA);
            }
            else
                $maStat->setPourcentageAutresMorts("Non défini");
            $nbPersonne=DB::table('personne')->where('Nationalite', $nationalite)->where('Etat', 'Mort')->count();
            if($nbPersonne>0) {
                $currentDate= date('Y-m-d');
                $date10ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -10 year");
                $date20ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -20 year");
                $date30ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -30 year");
                $date40ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -40 year");
                $date50ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -50 year");
                $date60ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -60 year");
                $date70ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -70 year");
                $date80ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -80 year");
                $date90ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -90 year");
                $date100ans= strtotime(date("Y-m-d", strtotime($currentDate)) . " -100 year");
                $maStat->setMoins10(100*(DB::table('personne')
                        ->where('Nationalite', $nationalite)
                        ->where('Etat', 'Mort')
                        ->where('DateNaissance', '>', $date10ans )
                        ->count())
                    / $nbPersonne);
                $maStat->setDe10a20(100*((DB::table('personne')
                        ->where('Nationalite', $nationalite)
                        ->where('Etat', 'Mort')
                        ->where('DateNaissance', '>', $date20ans )
                        ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date10ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setDe20a30(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date30ans )
                            ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date20ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setDe30a40(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date40ans )
                            ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date30ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setDe40a50(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date50ans )
                            ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date40ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setDe50a60(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date60ans )
                            ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date50ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setDe60a70(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date70ans )
                            ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date60ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setDe70a80(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date80ans )
                            ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date70ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setDe80a90(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date90ans )
                            ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date80ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setDe90a100(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date100ans )
                            ->count())-(DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date90ans )
                            ->count()))
                    / $nbPersonne);
                $maStat->setPlus100(100*(DB::table('personne')
                        ->where('Nationalite', $nationalite)
                        ->where('Etat', 'Mort')
                        ->where('DateNaissance', '<', $date100ans )
                        ->count())
                    / $nbPersonne);
            }
            else {
                $maStat->setMoins10("Non défini");
                $maStat->setDe10a20("Non défini");
                $maStat->setDe20a30("Non défini");
                $maStat->setDe30a40("Non défini");
                $maStat->setDe40a50("Non défini");
                $maStat->setDe50a60("Non défini");
                $maStat->setDe60a70("Non défini");
                $maStat->setDe70a80("Non défini");
                $maStat->setDe80a90("Non défini");
                $maStat->setDe90a100("Non défini");
                $maStat->setPlus100("Non défini");
            }
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

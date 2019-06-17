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
                $currentDate= new \DateTime();
                $date10ans=new \DateTime();
                $date10ans= $date10ans->sub(new \DateInterval('P10Y'));
                $date20ans=new \DateTime();
                $date20ans= $date20ans->sub(new \DateInterval('P20Y'));
                $date30ans=new \DateTime();
                $date30ans= $date30ans->sub(new \DateInterval('P30Y'));
                $date40ans=new \DateTime();
                $date40ans= $date40ans->sub(new \DateInterval('P40Y'));
                $date50ans=new \DateTime();
                $date50ans= $date50ans->sub(new \DateInterval('P50Y'));
                $date60ans=new \DateTime();
                $date60ans= $date60ans->sub(new \DateInterval('P60Y'));
                $date70ans=new \DateTime();
                $date70ans= $date70ans->sub(new \DateInterval('P70Y'));
                $date80ans=new \DateTime();
                $date80ans= $date80ans->sub(new \DateInterval('P80Y'));
                $date90ans=new \DateTime();
                $date90ans= $date90ans->sub(new \DateInterval('P90Y'));
                $date100ans=new \DateTime();
                $date100ans= $date100ans->sub(new \DateInterval('P100Y'));

                $maStat->setMoins10(100*(DB::table('personne')
                        ->where('Nationalite', $nationalite)
                        ->where('Etat', 'Mort')
                        ->where('DateNaissance', '>', '2009-06-16' )
                        ->count())
                    / $nbPersonne);
                $maStat->setDe10a20(100*((DB::table('personne')
                        ->where('Nationalite', $nationalite)
                        ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date20ans )
                            ->where('DateNaissance', '<', $date10ans)
                            ->count())
                        / $nbPersonne));
                $maStat->setDe20a30(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date30ans )
                            ->where('DateNaissance', '<', $date20ans)
                            ->count())
                    / $nbPersonne));
                $maStat->setDe30a40(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date40ans )
                            ->where('DateNaissance', '<', $date30ans)
                            ->count())
                        / $nbPersonne));
                $maStat->setDe40a50(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date50ans )
                            ->where('DateNaissance', '<', $date40ans)
                            ->count())
                        / $nbPersonne));
                $maStat->setDe50a60(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date60ans )
                            ->where('DateNaissance', '<', $date50ans)
                            ->count())
                        / $nbPersonne));
                $maStat->setDe60a70(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date70ans )
                            ->where('DateNaissance', '<', $date60ans)
                            ->count())
                        / $nbPersonne));
                $maStat->setDe70a80(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date80ans )
                            ->where('DateNaissance', '<', $date70ans)
                            ->count())
                        / $nbPersonne));
                $maStat->setDe80a90(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date90ans )
                            ->where('DateNaissance', '<', $date80ans)
                            ->count())
                        / $nbPersonne));
                $maStat->setDe90a100(100*((DB::table('personne')
                            ->where('Nationalite', $nationalite)
                            ->where('Etat', 'Mort')
                            ->where('DateNaissance', '>', $date100ans )
                            ->where('DateNaissance', '<', $date90ans)
                            ->count())
                        / $nbPersonne));
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

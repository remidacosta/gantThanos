<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modeles\StatistiquesDAO;
use App\Metier\Statistiques;

class StatistiquesController extends Controller
{
    public function getLesStatistiques()
    {
        $statistiques = new StatistiquesDAO();
        $lesStatistiques = $statistiques->getLesStatistiques();

        return view('statistiques', compact( 'lesStatistiques'));
    }
}

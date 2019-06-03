<?php

namespace App\Http\Controllers;
use App\Modeles\Conference;

use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    //
    public function getLesConferences(){
        $conference = new Conference();
        $lesConferences = $conference->getLesConferences();
        return view('listeConferences', compact( 'lesConferences'));
    }
}

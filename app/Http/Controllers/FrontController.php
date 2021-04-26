<?php

namespace App\Http\Controllers;

use App\Models\MyModels\Club;
use App\Models\MyModels\Publication;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;


class FrontController extends Controller
{
    public function ListeEtudiants(){
        $etudiants = User::where ("state",1)-> where("name",'<>',"admin")  ->get();
        return view('etudiants',compact('etudiants'));
    }


    public function ListeClubs()
    {
        $clubs = Club::get();
        return view('clubs', compact('clubs'));
    }
    public function ListeEvenements()
    {
        $evenements = Publication::where ("type",'Evenement')->get();
        return view('evenements', compact('evenements'));
    }

    public function ListeFormations()
    {
        $formations = Publication::where ("type",'Formation')->get();
        return view('formations', compact('formations'));
    }

    public function Liste3Evenements()
    {
        $date = Carbon::now()->toDateTimeString();


        $evenements = Publication::where ("type",'Evenement')->orderBy('date_and_time', 'asc')
                                            ->where("date_and_time",">","$date")->get();
        return view('index', compact('evenements'));
    }


}

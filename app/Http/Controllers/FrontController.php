<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

use App\Models\MyModels\Allfcodeins;
use App\Models\MyModels\Club;
use App\Models\MyModels\Publication;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Orchid\Screen\Fields\Select;


class FrontController extends Controller
{
    public function ListeEtudiants(){
        $etudiants = User::/*where ("state",1)->*/ where("name",'<>',"admin")->orderBy('last_name', 'asc')  ->get();


        return view('etudiants',compact('etudiants'));
    }


    public function ListeClubs()
    {
        $clubs = Club::get();
        return view('clubs', compact('clubs'));
    }
    public function ListeEvenements()
    {
        $evenements = Publication::where ("type",'Evenement')->orderBy('date_and_time', 'desc')->get();

        return view('evenements', compact('evenements'));

    }

    public function ListeFormations()
    {
        $formations = Publication::where ("type",'Formation')->orderBy('date_and_time', 'desc')->get();
        return view('formations', compact('formations'));
    }

    public function Liste3Evenements()
    {
        $date = Carbon::now()->toDateTimeString();


        $evenements = Publication::where ("type",'Evenement')->orderBy('date_and_time', 'asc')
            ->where("date_and_time",">","$date")->take(3)->get();

        $formations = Publication::where ("type",'Formation')->orderBy('date_and_time', 'asc')
            ->where("date_and_time",">","$date")->take(3)->get();
        $clubs =Club::orderBy('name','asc')->get();
        return view('index', compact('evenements','clubs','formations'));
    }







}

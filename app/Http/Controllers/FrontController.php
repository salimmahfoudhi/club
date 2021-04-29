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
        $etudiants = User::where ("state",1)-> where("name",'<>',"admin")->orderBy('name', 'asc')  ->get();
        return view('etudiants',compact('etudiants'));
    }


    public function ListeClubs()
    {
        $clubs = Club::get();
        return view('clubs', compact('clubs'));
    }
    public function ListeEvenements()
    {
        $evenements = Publication::where ("type",'Evenement')->orderBy('date_and_time', 'asc')->get();
        return view('evenements', compact('evenements'));
    }

    public function ListeFormations()
    {
        $formations = Publication::where ("type",'Formation')->orderBy('date_and_time', 'asc')->get();
        return view('formations', compact('formations'));
    }

    public function Liste3Evenements()
    {
        $date = Carbon::now()->toDateTimeString();


        $evenements = Publication::where ("type",'Evenement')->orderBy('date_and_time', 'asc')
                                            ->where("date_and_time",">","$date")->get();
        return view('index', compact('evenements'));
    }

    public function inscrire()
    {

        return view('inscrire');
    }




    public function InsertDbuser(Request $request)
    {

        //validate date before insert to DB

       $rules=$this->GetRules();

        $messages = $this->GetMessages();

        $validator=Validator::make($request->all(),$rules,$messages);

        if ($validator -> fails())
        {return redirect()->back()->withErrors($validator)->withInput($request->all());}





        //insert to db
        User::create([

            'f_registration_number'=> $request->f_registration_number,
              'Date_of_Birth'=> $request->Date_of_Birth,
              'name'=> $request->name,
            'last_name'=> $request->last_name,

             'password'=> $request->password,
             'email'=> $request->email,


        ]);

        return redirect()->back()->with(['success' =>'Enregistré avec succès']);
    }



    Protected function GetMessages(){
        return $messages= [
            'name.required' => '3abbi',
            'name.max' => 'leght <21',

            'f_registration_number.in'=>'mahouch mawjoud',
            'f_registration_number.required'=>'3abbi',
            'f_registration_number.max'=>'leght <21',
            'last_name.required'=>'3abbi',

            'last_name.max'=>'leght <=20',
            'Date_of_Birth.required'=>'3abbi',
            'email.email'=>'abc@.xyz',
            'email.required'=>'3abbiii',
            'email.unique'=>'unique',
            'password.required'=>'3abbi',
            'password.min'=>'pass>=8',




        ];
    }
    Protected function GetRules(){

       //$allNumrgs = Allfcodeins::SELECT ('Codeins')->get();
        $allNumrg='00000000';

        return  $rules=[
            'name'=> 'required|max:20',

         //  foreach ($allNumrgs as $allNumrg)
          'f_registration_number' => 'required|max:20|unique:users,f_registration_number|in:'.$allNumrg,
           // endforeach
/*  'f_registration_number' =>
                'required|max:20|unique:users,f_registration_number|in:'.$allNumrg,*/
            'last_name'=>'required|max:20',
            'Date_of_Birth'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8',
        ];
    }







}

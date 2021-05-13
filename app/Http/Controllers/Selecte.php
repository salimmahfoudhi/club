<?php

namespace App\Http\Controllers;

use App\Models\MyModels\Club;
use App\Models\Mymodels\Role;
use App\Models\Mymodels\Role_user;
use App\Models\User;
use Illuminate\Http\Request;

class Selecte extends Controller
{
    //user

    public function Etudiant(Request $request){
            $id= $request->id;
            $etudiants = User::where("id",$id) ->get();


            $roleusers=Role_user::where("user_id",$id) ->get();
          /*  $roleuser2=$roleuser1['role_id'];*/

            $roles= Role::get();


        return view('profile',compact('etudiants','roles', 'roleusers'));
    }

    public function club(Request $request){
        $id= $request->id;
        $clubs = Club::where("id",$id) ->get();
      //  $chefs =User::where("id",$clubs['cin_leader'])->get();
        $chefs =User::get();


        /*  $roleuser1=Role_user::where("user_id",$id) ->get()->value('role_id');
          $roleuser2=$roleuser1['role_id'];

          $roles= Role::where("id",$roleuser2)->get();*/
        return view('profileclubs',compact('clubs','chefs'));
    }



}

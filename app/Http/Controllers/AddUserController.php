<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Models\MyModels\Allfcodeins;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddUserController extends Controller
{
    //

    public function CreateUser()
    {


        return view('createuser');
    }

    public function Save(UserRequest $request)
    {








        //insert to db
        $user = User::create([

            'f_registration_number' => $request->f_registration_number,
           // 'f_registration_number' => $code3,
            'national_identity_card' => $request->national_identity_card,
            'Date_of_Birth' => $request->Date_of_Birth,
            'name' => $request->name,
            'last_name' => $request->last_name,

            'password' => Hash::make($request->password),
            'email' => $request->email,


        ]);

        if ($user) {
            return response()->json([
                'status' => true,

            ]);
        } else {
            {
                return response()->json([
                    'status' => false,

                ]);
            }


        }

    }




 /*   public  function  equal(Request $request){

        $coder= (string)$request->f_registration_number;
        $cinr= (string)$request->national_identity_card;

        $code = Allfcodeins::where ("CodeIns",$coder)->take(1)->get();






            foreach ($code as $code1){

                $code2 = $code1["CodeIns"]   ;
                $cin2 = $code1["national_identity_card"]   ;
            }

        if (($cin2==$cinr)&&($code2==$coder))



        return true;
        else
            return false;



    }*/





}

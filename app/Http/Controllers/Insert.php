<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Insert extends Controller
{


    public function inscrire()
    {

        return view('inscrire');
    }



    public function InsertDbuser(UserRequest $request)
    {

        //validate date before insert to DB

    /*    $rules=$this->GetRules();

        $messages = $this->GetMessages();

        $validator=Validator::make($request->all(),$rules,$messages);

        if ($validator -> fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());


        }*/





        //insert to db
        User::create([

            'f_registration_number'=> $request->f_registration_number,
            'Date_of_Birth'=> $request->Date_of_Birth,
            'name'=> $request->name,
            'last_name'=> $request->last_name,

            'password'=>  Hash::make($request->password),
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
        // $allNumrg=['00000000','11111111'];
        $allNumrg='0000000001';

        //   $allNumrg = Allfcodeins::select('CodeIns')->where('CodeIns','salim123')->get();
        return  $rules=[
            'name'=> 'required|max:20',

            //  @foreach ($allNumrgs as $allNumrg)
            'f_registration_number' => 'required|max:20|unique:users,f_registration_number|in:'.$allNumrg,
            // 'f_registration_number' => 'required|max:20|unique:users,f_registration_number|in:'.Allfcodeins,CodeIns',

            // @endforeach
            /*  'f_registration_number' =>
                            'required|max:20|unique:users,f_registration_number|in:'.$allNumrg,*/
            'last_name'=>'required|max:20',
            'Date_of_Birth'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8',
        ];
    }







}

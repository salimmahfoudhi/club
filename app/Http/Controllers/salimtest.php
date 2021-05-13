<?php

namespace App\Http\Controllers;

use App\Models\MyModels\Allfcodeins;
use Illuminate\Http\Request;

class salimtest extends Controller
{
    public  function  rech(Request $request){

        $code2='99999999';
        $code='1111';
        $code= $request->f_registration_number;
       $code3 = Allfcodeins::where ("CodeIns",$code)->take(1)->get();
/*
        if () {

            $code2 = '5555555';}

        else

        {   $code2 = '00001111';

        }*/
//true
  /*      foreach ($code3 as $code4)
        $code5 = $code4["CodeIns"]   ;


        return ($code5);*/
        return ($code);

    }


}

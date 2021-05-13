<?php

namespace App\Http\Requests;
use App\Models\MyModels\Allfcodeins;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {

        $coder= (string)$request->f_registration_number;
        $cinr= (string)$request->national_identity_card;



$code=$this->rechCode($coder,$cinr);
$cin=$this->rechCin($cinr);



        return [
            'name'=> 'required|max:20|min:3|',

            //  @foreach ($allNumrgs as $allNumrg)

            'national_identity_card' => 'required|max:8|min:8|unique:users,national_identity_card|in:'.$cin,

             'f_registration_number' => 'required|max:8|min:8|unique:users,f_registration_number|in:'.$code,


            // @endforeach
            /*  'f_registration_number' =>
                            'required|max:20|unique:users,f_registration_number|in:'.$allNumrg,*/
            'last_name'=>'required|max:20|min:3|',
            'Date_of_Birth'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8',
        ];
    }

    public function Messages(){
        return [
            'name.required' => '*Ce champ est obligatoire.',
            'name.max' => '*Veuillez fournir au maximum 20 caractères',
            'name.min' => '*Veuillez fournir au moins 3 caractères',

            'national_identity_card.required'=>'*Ce champ est obligatoire.',
            'national_identity_card.in'=>'*Veuillez entrer un numéro CIN valide',
            'national_identity_card.max'=>'*Veuillez fournir 8 chiffre',
            'national_identity_card.min'=>'*Veuillez fournir 8 chiffre',
            'national_identity_card.unique'=>'*Ce numéro CIN est déjà utilisé. Essayez un autre numéro CIN.',

            'f_registration_number.in'=>'*Veuillez entrer un code d\'inscription valide',
            'f_registration_number.required'=>'*Ce champ est obligatoire.',
            'f_registration_number.max'=>'*Veuillez fournir 8 caractères',
            'f_registration_number.min'=>'*Veuillez fournir 8 caractères',
            'f_registration_number.unique'=>'*Ce code d\'inscription est déjà utilisé. Essayez un autre code d\'inscription.',


            'last_name.required'=>'*Ce champ est obligatoire.',
            'last_name.max' => '*Veuillez fournir au maximum 20 caractères',
            'last_name.min' => '*Veuillez fournir au moins 3 caractères',

            'Date_of_Birth.required'=>'*Ce champ est obligatoire.',

            'email.email'=>'*Veuillez fournir une adresse électronique valide (abc@.xyz).',
            'email.required'=>'*Ce champ est obligatoire.',
            'email.unique'=>'*Ce email d\'utilisateur est déjà utilisé. Essayez un autre email.',


            'password.required'=>'*Ce champ est obligatoire.',
            'password.min'=>'*Veuillez fournir au moins 8 caractères',




        ];
    }


    public  function  rechCode(String $code,$cin){


       // $code= $request->f_registration_number;
        $code3 = Allfcodeins::where ("national_identity_card",$cin)->take(1)->get();
$code5='';
//true
              foreach ($code3 as $code4)
              $code5 = $code4["CodeIns"]   ;



         if ($code5 == $code) {

             $code6 = $code5;}

         else

         {   $code6 = '';

         }


              return ($code6);


    }

    public  function  rechCin(String $cin){


        // $code= $request->f_registration_number;
        $cin3 = Allfcodeins::where ("national_identity_card",$cin)->take(1)->get();
        $cin5='';
//true
        foreach ($cin3 as $cin4)
            $cin5 = $cin4["national_identity_card"]   ;



        if ($cin5 == $cin) {

            $cin6 = $cin5;}

        else

        {   $cin6 = '';

        }


        return ($cin6);


    }




}

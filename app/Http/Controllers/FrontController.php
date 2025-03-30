<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

use App\Models\MyModels\Allfcodeins;
use App\Models\MyModels\Club;
use App\Models\MyModels\Publication;
use App\Models\User;
use App\Models\Cvetudiant;
use App\Models\Clubetudiant;
use App\Models\Participationpublic;
use App\Models\Clubcommentaire;
use App\Models\Mymodels\Role;
use App\Models\Mymodels\Role_user;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Orchid\Screen\Fields\Select;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class FrontController extends Controller
{

    public function Index(){
        $clubs = Club::get();
		$evenements = Publication::where ("type",'Evenement')->orderBy('date_and_time', 'desc')->get();
		$formations = Publication::where ("type",'Formation')->orderBy('date_and_time', 'desc')->get();
        return view('index', compact('clubs','evenements','formations'));
    }
    public function ListeEtudiants(){
       // $etudiants = User::join('cvetudiants', 'cvetudiants.id_user', '=', 'users.id')->where("name",'<>',"admin")->orderBy('last_name', 'asc')  ->get();

        $etudiants = User::join('cvetudiants', 'cvetudiants.id_user', '=', 'users.id')
            ->where("name",'<>',"admin")->orderBy('last_name', 'asc')->select('users.personal_image','users.name','users.last_name', 'users.id')->get();

        return view('etudiants',compact('etudiants'));
    }


    public function ListeClubs()
    {
        $clubs = Club::where ("statut",1)->get();
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


       // $evenements = Publication::where ("type",'Evenement')->orderBy('date_and_time', 'asc')->where("date_and_time",">","$date")->take(3)->get();

		$evenements = Publication::where ("type",'Evenement')->take(3)->orderBy('date_and_time', 'desc')->get();

        //$formations = Publication::where ("type",'Formation')->orderBy('date_and_time', 'asc')->where("date_and_time",">","$date")->take(3)->get();

		$formations = Publication::where ("type",'Formation')->take(3)->orderBy('date_and_time', 'desc')->get();

        $clubs =Club::orderBy('name','asc')->get();
        return view('index', compact('evenements','clubs','formations'));
    }

 public function CreateUser()
    {

        $userdata="tt";
        $test = "test";
        return view('createuser',compact('userdata','test'));
    }

public function registerUser(Request $request)
    {

            $user = User::firstOrNew(['email' => $request->email]);
            $user->f_registration_number = $request->input('f_registration_number');
			$user->national_identity_card = $request->input('national_identity_card');
			$user->Date_of_Birth = $request->input('Date_of_Birth');
			$user->name = $request->input('name');
			$user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));

            $user->save();



            Auth::loginUsingId($user->id);
            $this->user = $user;




			return redirect('/')->with('success','Inscription Terminé.');
    }


public function showLogin()
    {
        // show the form
        //return View::make('login');
        return view('auth');

    }

	public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

	public function logout()
	{
			Auth::logout();
			return redirect('/')->with('success','Vous êtes connecté.');

	}

public function monprofil()
    {
        $user = Auth::user();
		$user_id = $user->id;
		$etudiant = User::firstOrNew(['id' => $user_id]);
        return view('monprofil', compact('etudiant'));

    }

	public function upateProfile(Request $request)
    {

			$user = Auth::user();
			$user_id = $user->id;

			$etudiant = User::firstOrNew(['id' => $user_id]);

			if($request->personal_image){
				$request->validate([
					'personal_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);

				$imageName = time().'.'.$request->personal_image->extension();

				$path = 'public/'.date('Y').'/'.date('m').'/'.date('d').'/';
				$path_url = '/storage/'.date('Y').'/'.date('m').'/'.date('d').'/';
				$path_img = $path_url.$imageName;

				$request->personal_image->storeAs($path, $imageName);
				$etudiant->personal_image = $path_img;
			}


            $etudiant->name = $request->input('name');
			$etudiant->last_name = $request->input('last_name');
			$etudiant->email = $request->input('email');
			if($request->input('password')){
			$etudiant->password = Hash::make($request->input('password'));
			}
			$etudiant->phone_number = $request->input('phone_number');


            $etudiant->save();

			return back()
            ->with('success','Votre profil a été bien modifié.');

			//return redirect('/monprofil')->with('success','Inscription Terminé.');
    }

public function formcv()
    {
        $user = Auth::user();
		$user_id = $user->id;
		$cv = Cvetudiant::firstOrNew(['id_user' => $user_id]);
        return view('cv', compact('cv'));

    }

	public function saveCv(Request $request)
    {

			$user = Auth::user();
			$user_id = $user->id;

            $cv = Cvetudiant::firstOrNew(['id_user' => $user_id]);
            $cv->apropos = $request->input('apropos');
			$cv->competences = $request->input('competences');
			$cv->education = $request->input('education');
			$cv->experience = $request->input('experience');

            $cv->save();

			return redirect('/cv')->with('success','Inscription Terminé.');
    }

	public function creationclub()
    {
		$user = Auth::user();
		$national_identity_card = $user->national_identity_card;
		$club = Club::firstOrNew(['cin_leader' => $national_identity_card]);
        return view('creationclub', compact('club'));

    }
		public function savecreationclub(Request $request)
    {

			$user = Auth::user();
			$national_identity_card = $user->national_identity_card;

            $club = Club::firstOrNew(['cin_leader' => $national_identity_card]);

			if($request->logo){
				$request->validate([
					'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);

				$imageName = 'logo-'.time().'.'.$request->logo->extension();

				$path = 'public/'.date('Y').'/'.date('m').'/'.date('d').'/';
				$path_url = '/storage/'.date('Y').'/'.date('m').'/'.date('d').'/';
				$path_img = $path_url.$imageName;

				$request->logo->storeAs($path, $imageName);
				$club->logo = $path_img;
			}

			if($request->banner){
				$request->validate([
					'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);

				$imageName = 'banner-'.time().'.'.$request->banner->extension();

				$path = 'public/'.date('Y').'/'.date('m').'/'.date('d').'/';
				$path_url = '/storage/'.date('Y').'/'.date('m').'/'.date('d').'/';
				$path_img = $path_url.$imageName;

				$request->banner->storeAs($path, $imageName);
				$club->banner = $path_img;
			}

            $club->name = $request->input('name');
			$club->description = $request->input('description');
			$club->cin_leader = $national_identity_card;

            $club->save();

			return back()
            ->with('success','Une confirmation de l\'admin est nécessaire pour activer votre club.');
    }


	public function club(Request $request){
        $id= $request->id;
        $clubs = Club::where("id",$id)->get();

		$publications =Publication::where("idclub",$id)->get();

		$club_selected = Club::where("id",$id)->first();

		$avg_club =Participationpublic::Where('id_club', $club_selected->id)->pluck('note')->avg();

		$comments_club =Clubcommentaire::Where('id_club', $club_selected->id)->orderBy('created_at', 'desc')->get();

        return view('profileclubs',compact('clubs','publications','avg_club','comments_club'));
    }

	public function ChargerCommentairesClub(Request $request){
        $id= $request->id;

		 $clubs = Club::where("id",$id)->get();

		$publications =Publication::where("idclub",$id)->get();

		$club_selected = Club::where("id",$id)->first();

		$avg_club =Participationpublic::Where('id_club', $club_selected->id)->pluck('note')->avg();

		$comments_club =Clubcommentaire::Where('id_club', $club_selected->id)->orderBy('created_at', 'desc')->get();

		$commentaires = "";
		foreach($comments_club as $comment){

		$useretudiants = DB::table('users')
			->where('id', $comment['id_etudiant'])
			->get();
			foreach ($useretudiants as $useretudiant){
				$name     =  $useretudiant->name;
				$last_name     =  $useretudiant->last_name;
				$personal_image     =  $useretudiant->personal_image;
			}

		$commentaires .= '<div id="comment-'.$comment['id'].'" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="'.$personal_image.'" alt=""></div>
                  <div>
                    <h5><a href="">'.$name.' '.$last_name.'</a></h5>
                    <time datetime="2020-01-01">'.$comment['created_at'].'</time>
                    <p>
                      '.$comment['message'].'
                    </p>
                  </div>
                </div>
              </div>';
        }

        return $commentaires;
    }


	public function joindreClub(Request $request){
        $user = Auth::user();
		$id = $user->id;

		$id_club = $request->id_club;

		$clubetudiant = Clubetudiant::firstOrNew(['id_etudiant' => $id]);
		$clubetudiant->id_etudiant = $id;
		$clubetudiant->id_club = $id_club;
		$clubetudiant->etat = 0;

		$clubetudiant->save();

		return redirect('/clubs/'.$id_club);

    }

	public function showpublication(Request $request){

		$user = Auth::user();
		$id_user = $user->id;

        $id= $request->id;
        $publications = Publication::where("id",$id)->get();

		$publication = Publication::where("id",$id)->first();
		$clubs =Club::where("id",$publication->idclub)->first();

		$participublic = Participationpublic::where(['id_pub' => $publication->id,'id_etudiant' => $id_user])->get();

		$partici = Participationpublic::where(['id_pub' => $publication->id,'id_etudiant' => $id_user])->first();

		$count_p=$participublic->count();
		if($partici){$note_p=$partici->note;}else{$note_p=null;}


        return view('publications',compact('clubs','publications','count_p','note_p'));
    }
	public function participPublic(Request $request){


		$user = Auth::user();
		$id_user = $user->id;

		$id_pub= $request->id;

		$participublic = Participationpublic::firstOrNew(['id_pub' => $id_pub,'id_etudiant' => $id_user]);

		$publication = Publication::where("id",$id_pub)->first();

		$participublic->id_pub = $id_pub;
		$participublic->id_etudiant = $id_user;
		$participublic->id_club = $publication->id;

		$participublic->save();



        return back()
            ->with('success','Vous venez de vous inscrire à cet évenement.');
    }

	public function saveRating(Request $request)
    {

		$user = Auth::user();
		$id_user = $user->id;

		$id_pub= $request->id;

		$note = $request->rating;
		$avis_commentaire = $request->remark;

		$participublic = Participationpublic::firstOrNew(['id_pub' => $id_pub,'id_etudiant' => $id_user]);

		$participublic->id_club = $request->idclub;
		$participublic->note = $note;
		$participublic->commentaire = $avis_commentaire;

		$participublic->save();



		return redirect('/publications/'.$id_pub)
            ->with('success','Votre évaluation a été bien enregistré. Merci');


    }

	public function clubCommentaires(Request $request)
    {

		$user = Auth::user();
		$id_etudiant = $user->id;

		$comment = $request->comment;

		$clubcommentaire = new Clubcommentaire();

		$clubcommentaire->id_club = $request->idclub;
		$clubcommentaire->id_etudiant = $id_etudiant;
		$clubcommentaire->message = $comment;

		$clubcommentaire->save();



		return back()
            ->with('success','Vous venez de vous inscrire à cet évenement.');


    }


	public function Etudiant(Request $request){
            $id= $request->id;
            $etudiants = User::where("id",$id) ->get();


            $roleusers=Role_user::where("user_id",$id) ->get();
          /*  $roleuser2=$roleuser1['role_id'];*/

            $roles= Role::get();

			$cv=Cvetudiant::where("id_user",$id) ->get();


        return view('profile',compact('etudiants','roles', 'roleusers','cv'));
    }


}

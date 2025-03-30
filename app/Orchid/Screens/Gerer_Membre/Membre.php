<?php

namespace App\Orchid\Screens\Gerer_Membre;

use Orchid\Screen\Screen;
use App\Models\Clubetudiant;
use App\Models\User;
use App\Models\MyModels\Club;


use App\Orchid\Layouts\Membrelayout\MembreFiltersLayout;
use App\Orchid\Layouts\Membrelayout\EtudiantsListClubLayout;

use Illuminate\Support\Facades\Auth;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Illuminate\Support\Facades\DB;

class Membre extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Membre';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Membre';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
		
		
		$user = Auth::user();
		$national_identity_card = $user->national_identity_card;  
		
		$roles_user = Auth::user()->inRole(1);
		if($roles_user){
			$etudiants = Clubetudiant::join('users', 'users.id', '=', 'clubetudiants.id_etudiant')
			->join('clubs', 'clubetudiants.id_club', '=', 'clubs.id')
			->where('clubs.cin_leader',$national_identity_card)
			->where('clubetudiants.etat',1)
			->get(['users.*','clubs.logo', 'clubetudiants.id_etudiant', 'clubetudiants.etat', 'clubetudiants.id as idclubetudiant']);
			
		}else{
			$etudiants = Clubetudiant::join('users', 'users.id', '=', 'clubetudiants.id_etudiant')
			->join('clubs', 'clubetudiants.id_club', '=', 'clubs.id')
			->get(['users.*','clubs.logo', 'clubetudiants.id_etudiant', 'clubetudiants.etat', 'clubetudiants.id as idclubetudiant']);
        
		}
		
		return [
            'clubetudiants' => $etudiants,
			];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
         return [
          //  ClubFiltersLayout::class,
            EtudiantsListClubLayout::class
        ];
    }
	
	public function remove(Clubetudiant $clubetudiants)
    {
        $clubetudiants->delete();

       

        return redirect()->route('platform.membre');
    }
	
	public function activetudiant(Clubetudiant $clubetudiants)
    {
         
		
			$clubetudiants = Clubetudiant::firstOrNew(['id' => $clubetudiants->id]);
			if($clubetudiants->etat == 0){
				$clubetudiants->etat = 1;
			}else{
				$clubetudiants->etat = 0;
			}
            
            $clubetudiants->save();
			
 	
 

        return redirect()->route('platform.membre');
    }
	
}

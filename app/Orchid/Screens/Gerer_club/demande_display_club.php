<?php

namespace App\Orchid\Screens\Gerer_club;

use App\Models\MyModels\Club;
use App\Models\User;
use App\Models\Clubetudiant;
use App\Orchid\Layouts\Clublayout\ClubFiltersLayout;
use App\Orchid\Layouts\Clublayout\DemandeClubListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;

use Illuminate\Support\Facades\Auth;


class demande_display_club extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Demande création Club';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Les demandes de création des Club';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
			
			return [
            'clubs' => Club::Where('close', 0)
				->where(function($q) {
					  $q->where('statut', 0)
						->orWhere('type_demande', 'fermer');
				  })
				
				
				
                ->filters()
                ->filtersApplySelection(ClubFiltersLayout::class)
                ->defaultSort('id', 'desc')
                ->paginate(),
			];
		
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
       return [
        ];
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
            DemandeClubListLayout::class
        ];
    }

    public function remove(Club $club)
    {
        $club->delete();

        Alert::info('Vous avez supprimé le club avec succès.');

        return redirect()->route('platform.display_club');
    }
	
	public function activ(Club $club)
    {
        //$club->delete();
		
			$club = Club::firstOrNew(['id' => $club->id]);
			if($club->statut == 0){
				$club->statut = 1;
			}else{
				$club->statut = 0;
			}
            
            $club->save();
			
			
			
	$user = User::firstOrNew(['national_identity_card' => $club->cin_leader]);
	$permissions ='{}';

	$user->permissions = $permissions; 
		$user->save();
	$user->roles()->attach(1);		
	
	
		$clubetudiant = Clubetudiant::firstOrNew(['id_etudiant' => $user->id]);
		$clubetudiant->id_etudiant = $user->id;
		$clubetudiant->id_club = $club->id;
		$clubetudiant->etat = 1;
		
		$clubetudiant->save();
		

        Alert::info('Vous avez activé le club avec succès.');

        return redirect()->route('platform.demande_display_club');
    }


	
	public function fermer(Club $club)
    {
        //$club->delete();
		
			$club = Club::firstOrNew(['id' => $club->id]);
			$club->type_demande	 = "fermer";
			$club->statut = 0;
			$club->close = 1;
			$club->save();
			
			$user = User::firstOrNew(['national_identity_card' => $club->cin_leader]);
			$user->roles()->detach();
			

        Alert::info('Vous avez fermé le club avec succès.');

        return redirect()->route('platform.demande_display_club');
    }
	

    public $permission = [
        'platform.display_club'
    ];
}

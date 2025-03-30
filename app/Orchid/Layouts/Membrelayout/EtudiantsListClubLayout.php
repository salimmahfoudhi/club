<?php

namespace App\Orchid\Layouts\Membrelayout;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\User;
use App\Models\MyModels\Club;
use App\Models\Clubetudiant;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Actions\Button;

class EtudiantsListClubLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'clubetudiants';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
		
		$user = User::all();
		
        return [
			TD::make('logo', 'Club')
			
                ->width('150')
                ->render(function ($clubetudiants) {

                    return "<img src='{$clubetudiants->logo}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>";
			}),
			TD::make('full_name')
			->render(function ($clubetudiants) {
				return $clubetudiants->name . ' ' . $clubetudiants->last_name;
			}),
			/* TD::make('etat','Etat'), */
			
			TD::make('etat', 'Etat')
                ->render(function (Clubetudiant $clubetudiants) {
					if($clubetudiants->etat == 1){$btnactiv="Activer";$iconactic="check";$confirm="Vous vous activer ce club ?";$color="green";}else{$btnactiv="Desactiver";$iconactic="ban";$confirm="Vous vous désactiver ce club ?";$color="red";}
					return "<p class='$color' >$btnactiv</p>";
                }),
			
			TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Clubetudiant $clubetudiants) {
					
					if($clubetudiants->etat == 0){$btnactiv="Activer";$iconactic="check";$confirm="Joindre cet étudiant au club ?";}else{$btnactiv="Desactiver";$iconactic="ban";$confirm="Désactiver cet étudiant au club ?";}
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([


                            Button::make(__('Suppimer'))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Supprimer cet étudiant du club. '))
                                ->parameters([
                                    'id' => $clubetudiants->idclubetudiant,
                                ]),
							Button::make(__($btnactiv))
                                ->icon($iconactic)
                                ->method('activetudiant')
                                ->confirm(__($confirm))
                                ->parameters([
                                    'id' => $clubetudiants->idclubetudiant,
                                ]),
                        ]);
                }),
	
		];
    }
}

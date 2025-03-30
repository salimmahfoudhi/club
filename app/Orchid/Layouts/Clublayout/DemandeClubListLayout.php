<?php

namespace App\Orchid\Layouts\Clublayout;

use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\MyModels\Club;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Alert;
use Illuminate\Support\Str;


class DemandeClubListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'clubs';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
             /* TD::make()
                  ->render(function (Club $club) {
                      return Link::make($club->title)
                          ->route('platform.display_club', $club);  //zeyeddd??
                  }),*/

            TD::make('name', 'Nom')
                ->filter(TD::FILTER_TEXT)
                ->render(function (Club $club) {
                    return Link::make($club->name)
                        ->route('platform.Update_and_Remove_Club', $club);}),




           /*  TD::make('cin_leader', 'Cin Chef'), 
           TD::make('description', 'Description'),*/
		   
		   TD::make('description', 'Description')
                ->render(function (Club $club) {
					$description=Str::words($club->description, 10, ' ...');
					return $description;
                }),

			TD::make('statut', 'Statut')
                ->render(function (Club $club) {
					if($club->type_demande == "ouvrir"){$btnactiv="Demande d'activation ";$color="green";}else{$btnactiv="Demande de désactivation";$color="red";}
					return "<p class='$color' style='padding:0 10px;'>$btnactiv</p>";
                }),

            TD::make('logo', 'Logo')
                ->width('150')
                ->render(function (Club $club) {

                    return "<img src='{$club->logo}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>";
                }),

            TD::make('banner', 'Banniére')
                ->width('150')
                ->render(function (Club $club) {

                    return "<img src='{$club->banner}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>";
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Club $club) {
					
					if($club->statut == 0){$btnactiv="Activer";$iconactic="check";$confirm="Vous vous activer ce club ?";$method="activ";}
					if($club->type_demande == 'fermer'){$btnactiv="Fermer";$iconactic="ban";$confirm="Vous voulez fermée ce club ?";$method="fermer";}
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Modifier'))
                                ->route('platform.Update_and_Remove_Club', $club->id)
                                ->icon('pencil'),

                            
							Button::make(__($btnactiv))
                                ->icon($iconactic)
                                ->method($method)
                                ->confirm(__($confirm))
                                ->parameters([
                                    'id' => $club->id,
                                ]),
							
							/* Button::make(__('Suppimer'))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Une fois le Club supprimer, toutes ses ressources et données seront définitivement supprimées. '))
                                ->parameters([
                                    'id' => $club->id,
                                ]), */
								
								
                        ]);
                }),







       ];
    }


}

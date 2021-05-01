<?php

namespace App\Orchid\Screens\Gerer_club;

use App\Models\MyModels\Club;
use App\Orchid\Layouts\Clublayout\ClubFiltersLayout;
use App\Orchid\Layouts\Clublayout\ClubListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;

class display_club extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Afficher clubs';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Tous les clubs enregistrés';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'clubs' => Club:://with('roles')
                filters()
                ->filtersApplySelection(ClubFiltersLayout::class)
                ->defaultSort('id', 'desc')
                ->paginate(),


          //  'clubs' => Club::paginate()


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
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.Add_club')
                ->type(Color::SECONDARY()),
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
            ClubListLayout::class
        ];
    }

    public function remove(Club $club)
    {
        $club->delete();

        Alert::info('Vous avez supprimé le club avec succès.');

        return redirect()->route('platform.display_club');
    }



    public $permission = [
        'platform.display_club'
    ];
}

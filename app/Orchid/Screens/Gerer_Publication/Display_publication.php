<?php

namespace App\Orchid\Screens\Gerer_Publication;

use App\Models\MyModels\Publication;
use App\Orchid\Layouts\Clublayout\ClubFiltersLayout;
use App\Orchid\Layouts\Publicationlayout\PubFiltersLayout;
use App\Orchid\Layouts\Publicationlayout\PublicationListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;

class Display_publication extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Afficher Publications';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Afficher Publications';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [


            'publications' => Publication:://with('roles')
         filters()
        ->filtersApplySelection(PubFiltersLayout::class)
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
            Link::make('Ajouter Publication')
                ->icon('plus')
                ->type(Color::SECONDARY())
                ->route('platform.Add_publication'),

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
            PubFiltersLayout::class,

            PublicationListLayout::class

        ];
    }


    public function remove(Publication $publication)
    {
        $publication->delete();

        Alert::info('Vous avez supprimé le Publication avec succès.');

        return redirect()->route('platform.Display_publication');
    }


    public $permission = [
        'platform.Display_publication'
    ];


}

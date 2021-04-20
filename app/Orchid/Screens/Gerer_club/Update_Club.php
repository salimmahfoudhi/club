<?php

namespace App\Orchid\Screens\Gerer_club;

use App\Models\MyModels\Club;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class Update_Club extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Update_Club';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Update_Club';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
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
            Layout::rows([

                Relation::make('Club.id')
                    ->title('Id Club')
                    ->required()

                    ->fromModel(Club::class, 'id'), //bech ijibli lista li fel bd ta3 cin

            ]),
        ];
    }
}

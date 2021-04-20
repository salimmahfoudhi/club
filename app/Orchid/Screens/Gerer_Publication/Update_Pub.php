<?php

namespace App\Orchid\Screens\Gerer_Publication;


use App\Models\MyModels\Publication;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class Update_Pub extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Update_Pub';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Update_Pub';

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

                Relation::make('Publication.id')
                    ->title('Id Publication')
                    ->required()
                    ->fromModel(Publication::class, 'id'), //bech ijibli lista li fel bd ta3 id

            ]),


        ];
    }

}

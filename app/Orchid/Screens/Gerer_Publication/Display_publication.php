<?php

namespace App\Orchid\Screens\Gerer_Publication;

use App\Models\MyModels\Publication;
use App\Orchid\Layouts\Publicationlayout\PublicationListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;

class Display_publication extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Display_publication';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Display_publication';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'publications' => Publication::paginate()

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
            Link::make('add Pub')
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

            PublicationListLayout::class

        ];
    }
}

<?php

namespace App\Orchid\Screens\Gerer_club;

use App\Models\MyModels\Club;
use App\Orchid\Layouts\Clublayout\ClubListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;

class display_club extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'display_club';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'display_club';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'clubs' => Club::paginate()
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
            Link::make('add Club')
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

            ClubListLayout::class
        ];
    }
}

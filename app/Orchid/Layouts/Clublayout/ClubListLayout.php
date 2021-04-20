<?php

namespace App\Orchid\Layouts\Clublayout;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\MyModels\Club;
use Orchid\Screen\Actions\Link;







class ClubListLayout extends Table
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
            TD::make('id', 'Id')
                ->render(function (Club $club) {
                    return Link::make($club->id)
                        ->route('platform.Update_and_Remove_Club', $club);}),


            TD::make('name', 'name'),
            TD::make('id_leader', 'id_leader'),
            TD::make('description', 'description'),



            TD::make('logo', 'Logo')
                ->width('150')
                ->render(function (Club $club) {

                    return "<img src='{$club->logo}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>";
                }),

            TD::make('banner', 'Banner')
                ->width('150')
                ->render(function (Club $club) {

                    return "<img src='{$club->banner}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>";
                }),







       ];
    }
}

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

            TD::make('name', 'Nom')
                ->filter(TD::FILTER_TEXT)
                ->render(function (Club $club) {
                    return Link::make($club->name)
                        ->route('platform.Update_and_Remove_Club', $club);}),




            TD::make('cin_leader', 'Cin Chef'),
           TD::make('description', 'Description'),



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
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Modifier'))
                                ->route('platform.Update_and_Remove_Club', $club->id)
                                ->icon('pencil'),

                            Button::make(__('Suppimer'))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Une fois le Club supprimer, toutes ses ressources et données seront définitivement supprimées. '))
                                ->parameters([
                                    'id' => $club->id,
                                ]),
                        ]);
                }),







       ];
    }


}

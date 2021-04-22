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

            TD::make('name', 'name')
                ->filter(TD::FILTER_TEXT)
                ->render(function (Club $club) {
                    return Link::make($club->name)
                        ->route('platform.Update_and_Remove_Club', $club);}),




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

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Club $club) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Edit'))
                                ->route('platform.Update_and_Remove_Club', $club->id)
                                ->icon('pencil'),

                            Button::make(__('Delete'))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->parameters([
                                    'id' => $club->id,
                                ]),
                        ]);
                }),







       ];
    }


}

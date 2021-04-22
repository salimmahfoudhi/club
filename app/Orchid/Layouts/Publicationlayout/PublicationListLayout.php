<?php

namespace App\Orchid\Layouts\Publicationlayout;

use App\Models\MyModels\Club;
use App\Models\MyModels\Publication;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PublicationListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'publications';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [

             TD::make('id', 'Id')
                 ->filter(TD::FILTER_TEXT)
                 ->render(function (Publication $publication) {
                     return Link::make($publication->id)
                         ->route('platform.Update_And_Remove_Pub', $publication);}),


            TD::make('id_publisher','Id publisher'),
            TD::make('type', 'Type'),
            TD::make('banner', 'Banner')
                ->width('150')
                ->render(function (Publication $publication) {

                    return "<img src='{$publication->banner}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>";
                }),

            TD::make('description', 'Description'),


            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Publication $publication) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Edit'))
                                ->route('platform.Update_And_Remove_Pub', $publication->id)
                                ->icon('pencil'),

                            Button::make(__('Delete'))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->parameters([
                                    'id' => $publication->id,
                                ]),
                        ]);
                }),






        ];
    }
}

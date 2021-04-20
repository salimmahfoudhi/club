<?php

namespace App\Orchid\Layouts\Publicationlayout;

use App\Models\MyModels\Club;
use App\Models\MyModels\Publication;
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






        ];
    }
}

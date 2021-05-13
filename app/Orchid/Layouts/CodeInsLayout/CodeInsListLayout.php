<?php

namespace App\Orchid\Layouts\CodeInsLayout;

use App\Models\MyModels\Allfcodeins;
use App\Models\MyModels\Club;
use App\Models\MyModels\Publication;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CodeInsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'allfcodeins';  //esm table

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [

            TD::make('id', 'Id'),

TD::make('national_identity_card','CIN')
    ->filter(TD::FILTER_TEXT)
    ->render(function (Allfcodeins $allfcodeins) {
        return Link::make($allfcodeins->national_identity_card)
            ->route('platform.Update_And_Remove_Code', $allfcodeins);}),


            TD::make('CodeIns', 'Code Inscri')
             ,



            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Allfcodeins $allfcodeins) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Modifier'))
                                ->route('platform.Update_And_Remove_Code', $allfcodeins->id)
                                ->icon('pencil'),

                            Button::make(__('Suppimer'))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Une fois le code supprimer, toutes ses ressources et données seront définitivement supprimées.'))
                                ->parameters([
                                    'id' => $allfcodeins->id,
                                ]),
                        ]);
                }),






        ];
    }
}

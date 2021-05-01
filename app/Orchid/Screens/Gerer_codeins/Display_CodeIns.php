<?php

namespace App\Orchid\Screens\Gerer_codeins;

use App\Models\MyModels\Allfcodeins;


use App\Orchid\Layouts\CodeInsLayout\CodeFiltersLayout;
use App\Orchid\Layouts\CodeInsLayout\CodeInsListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;

class Display_CodeIns extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Afficher CodeIns';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Afficher CodeIns';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [


            'allfcodeins' => Allfcodeins:://with('roles')
            filters()
                ->filtersApplySelection(CodeFiltersLayout::class)
                ->defaultSort('id', 'desc')
                ->paginate(),

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
            Link::make('Ajouter CodeIns')
                ->icon('plus')
                ->type(Color::SECONDARY())
                ->route('platform.Add_Codeins'),

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
          //  CodeFiltersLayout::class,

            CodeInsListLayout::class

        ];
    }


    public function remove(Allfcodeins $allfcodeins)
    {
        $allfcodeins->delete();

        Alert::info('Vous avez supprimé le code Ins avec succès.');

        return redirect()->route('platform.Display_CodeIns');
    }


  /*  public $permission = [
        'platform.Display_publication'
    ];*/


}


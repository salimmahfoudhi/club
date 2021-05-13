<?php

namespace App\Orchid\Screens\Gerer_codeins;

use App\Models\MyModels\Allfcodeins;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use App\Models\MyModels\Club;


class AddCodeIns extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Ajouter code ins';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = '';

    /**
     * Query data.
     *
     * @return array
     */
    public $exists = false;


    public function query(Allfcodeins $allfcodeins): array
    {
        $this->exists = $allfcodeins->exists;

        if($this->exists){
            $this->name = 'Ajouter un club';
        }

        return [
            'Allfcodeins' => $allfcodeins
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

            Layout::rows([

                Input::make('Allfcodeins.national_identity_card')
                    ->type('Sting')
                    ->required()
                    ->title('CIN Etudiant')
                    ->placeholder('CIN Etudiant')
                    ->horizontal(),


                Input::make('Allfcodeins.CodeIns')
                    ->type('Sting')
                    ->required()
                    ->title('Code Ins etudiant')
                    ->placeholder('Code  Ins etudiant')
                    ->horizontal(),



                Button::make('Ajouter')
                    ->icon('check')
                    ->method('addnewcode')
                    ->canSee(!$this->exists)
                    ->type(Color::SECONDARY())
                    ->title('')
                    ->horizontal(),




            ]),
        ];
    }
    public function addnewcode(Allfcodeins $allfcodeins, Request $request)
    {
        $allfcodeins->fill($request->get('Allfcodeins'))->save(); //Allf esm model

        Alert::info('Vous avez réussi à ajouter un code ins.');

        return redirect()->route('platform.Add_Codeins');
    }










    public $permission = [
        'platform.Add_Codeins'
    ];



}

<?php

namespace App\Orchid\Screens\Gerer_codeins;

use App\Models\MyModels\Allfcodeins;
use App\Models\MyModels\Etudiant;
use App\Models\MyModels\Publication;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;



class Update_And_Remove_Code extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */



    public $name = 'Modifier Code Ins';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Modifier Code ins Détails';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Allfcodeins $allfcodeins
     *
     * @return array
     */
    public function query(Allfcodeins $allfcodeins): array
    {
        $this->exists = $allfcodeins->exists;

        if($this->exists){
            $this->name = 'Modifier code';
        }

        $allfcodeins->load('attachment');


        return [
            'Allfcodeins' => $allfcodeins
        ];
    }


    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [

            Button::make('Enregistrer')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists)
                ->type(Color::SECONDARY()),

            Button::make('Supprimer')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists)
                ->type(Color::SECONDARY()),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
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






            ])







        ];
    }

    /**
     * @param Allfcodeins    $allfcodeins
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Allfcodeins $allfcodeins, Request $request)
    {
        $allfcodeins->fill($request->get('Allfcodeins'))->save();

        $allfcodeins->attachment()->syncWithoutDetaching(
            $request->input('Allfcodeins.attachment', [])
        );

        Alert::info('La mise à jour a réussi');

        return redirect()->route('platform.Display_CodeIns');
    }

    /**
     * @param Allfcodeins $allfcodeins
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Allfcodeins $allfcodeins)
    {
        $allfcodeins->delete();

        Alert::info('Vous avez supprimé le pub avec succès.');

        return redirect()->route('platform.Display_CodeIns');
    }

 /*   public $permission = [
        'platform.Display_publication'
    ];*/
}


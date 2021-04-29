<?php

namespace App\Orchid\Screens\Gerer_Publication;

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

class Update_And_Remove_Pub extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */



    public $name = 'Modifier Publication';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Modifier Publication Détails tels que Nom, Type et Description';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Publication $publication
     *
     * @return array
     */
    public function query(Publication $publication): array
    {
        $this->exists = $publication->exists;

        if($this->exists){
            $this->name = 'Edit Pub';
        }

        $publication->load('attachment');


        return [
            'Publication' => $publication
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

                Input::make('Publication.cin_publisher')
                    ->type('Integer')
                    ->required()
                    ->title('Cin Publisher')
                    ->placeholder('Cin chef')
                    ->horizontal(),



                Select::make('Publication.type')
                    ->required()
                    ->options([
                        'Evenement' => 'Evenement',
                        'Formation'   => 'Formation',

                    ])
                    ->title('Sélectionner le type')
                    ->horizontal(),


                Cropper::make('Publication.banner')
                    ->targetRelativeUrl()
                    ->title('Large web banner image')
                    ->required()
                    ->width(900)
                    ->height(600)
                    ->horizontal(),



                TextArea::make('Publication.description')
                    ->type('text')
                    ->required()
                    ->title('Description')
                    ->placeholder('Description')
                    ->horizontal(),












            ])







        ];
    }

    /**
     * @param Publication    $publication
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Publication $publication, Request $request)
    {
        $publication->fill($request->get('Publication'))->save();

        $publication->attachment()->syncWithoutDetaching(
            $request->input('Publication.attachment', [])
        );

        Alert::info('La mise à jour a réussi');

        return redirect()->route('platform.Display_publication');
    }

    /**
     * @param Publication $publication
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Publication $publication)
    {
        $publication->delete();

        Alert::info('Vous avez supprimé le pub avec succès.');

        return redirect()->route('platform.Display_publication');
    }

    public $permission = [
        'platform.Display_publication'
    ];
}


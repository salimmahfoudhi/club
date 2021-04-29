<?php

namespace App\Orchid\Screens\Gerer_Publication;

use App\Models\MyModels\Club;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use App\Models\MyModels\Publication;
use App\Models\MyModels\Etudiant;
use App\Models\User;

use Illuminate\Http\Request;

use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;


use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;

class Add_publication extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Ajouter Publication';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Détails tels que Type, Description...';

    /**
     * Query data.
     *
     * @return array
     */
    public $exists = false;


    public function query(Publication $publication): array
    {
        $this->exists = $publication->exists;

        if($this->exists){
            $this->name = 'Ajouter Publication';
        }

        return [
            'Publication' => $publication
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
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




                Relation::make('Publication.cin_publisher')
                    ->title('CIN //automatic ?')
                    ->required()
                    ->type('Integer')
                    ->placeholder('CIN Publisher')
                    ->fromModel(User::class, 'national_identity_card')
                    ->horizontal(),



                Select::make('Publication.type')
                    ->required()
                    ->options([
                        'Evenement' => 'Evenement',
                        'Formation'   => 'Formation',

                    ])
                    ->title('Sélectionner le type')
                    ->horizontal(),

                Input::make('Publication.name')
                    ->type('string')
                    ->title('Nom')
                    ->placeholder('Nom')
                    ->horizontal(),


                TextArea::make('Publication.description')
                    ->type('text')
                    ->required()
                    ->title('Description')
                    ->placeholder('Description')
                    ->horizontal(),




                Input::make('Publication.date_and_time')
                    ->type('datetime-local')
                    ->title('Date et l\'heure')

                    ->horizontal(),


                Cropper::make('Publication.banner')
                    ->targetRelativeUrl()
                    ->title('Grande image de banniére Publication')
                    ->required()
                    ->width(900)
                    ->height(600)
                    ->horizontal(),






                Button::make('Ajouter')
                    ->icon('check')
                    ->method('addnewPublication')
                    ->canSee(!$this->exists)
                    ->title('')
                    ->type(Color::SECONDARY())
                    ->horizontal(),









                ])







        ];
    }



    public function addnewPublication(Publication $publication, Request $request)
    {
        $publication->fill($request->get('Publication'))->save(); //Publication esm model

        Alert::info('Vous avez réussi à ajouter un publication.');

        return redirect()->route('platform.Add_publication');
    }


    public $permission = [
        'platform.Add_publication'
    ];
}

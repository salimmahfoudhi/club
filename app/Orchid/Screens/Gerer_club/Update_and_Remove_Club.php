<?php

namespace App\Orchid\Screens\Gerer_club;

use App\Models\MyModels\Club;
use App\Models\MyModels\Etudiant;
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

class Update_and_Remove_Club extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */



    public $name = 'Modifier club';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Détails tels que Nom, Chef et Description

';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Club $club
     *
     * @return array
     */
    public function query(Club $club): array
    {
        $this->exists = $club->exists;

        if($this->exists){
            $this->name = 'Modifier club';
        }

        $club->load('attachment');


        return [
            'Club' => $club
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



                Input::make('Club.name')
                    ->type('text')
                    ->required()
                    ->title('Nom du club')
                    ->placeholder('Nom du club'),

                TextArea::make('Club.description')
                    ->type('text')
                    ->required()
                    ->title('Description')
                    ->placeholder('Description'),

                Input::make('Club.cin_leader')
                    ->type('Integer')
                    ->required()
                    ->title('CIN Chef')
                    ->placeholder('CIN Chef'),






                Cropper::make('Club.logo')
                    ->targetRelativeUrl()
                    ->title('Large web logo image')
                    ->width(700)
                    ->height(600),


                Cropper::make('Club.banner')
                    ->targetRelativeUrl()
                    ->title('Large web banner image')
                    ->width(1500)
                    ->height(600),






            ]),
        ];
    }

    /**
     * @param Club    $club
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Club $club, Request $request)
    {
        $club->fill($request->get('Club'))->save();

        $club->attachment()->syncWithoutDetaching(
            $request->input('Club.attachment', [])
        );

        Alert::info('You have successfully update an club.');

        return redirect()->route('platform.display_club');
    }

    /**
     * @param Club $club
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Club $club)
    {
        $club->delete();

        Alert::info('You have successfully deleted the Club.');

        return redirect()->route('platform.display_club');
    }

    public $permission = [
        'platform.display_club'
    ];
}


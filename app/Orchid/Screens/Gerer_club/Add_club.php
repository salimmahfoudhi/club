<?php

namespace App\Orchid\Screens\Gerer_club;

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


class Add_club extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Ajouter un club';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Détails tels que nom, chef et Description';

    /**
     * Query data.
     *
     * @return array
     */
    public $exists = false;


    public function query(Club $club): array
    {
        $this->exists = $club->exists;

        if($this->exists){
            $this->name = 'Ajouter un club';
        }

        return [
            'Club' => $club
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



                Input::make('Club.name')
                    ->type('Sting')
                    ->required()
                    ->title('Nom club')
                    ->placeholder('Nom club')
                    ->horizontal(),

                TextArea::make('Club.description')
                    ->type('text')
                    ->required()
                    ->title('Description')
                    ->placeholder('Description')
                    ->horizontal(),


            /*    Input::make('Club.cin_leader')
                    ->type('Integer')
                    ->required()
                    ->title('CIN')
                   // ->placeholder('this->user.national_identity_card')
               //     ->getOldValue(this->user.national_identity_card)

               ->required()
               ->fromModel(User::class, 'national_identity_card')

                    ,*/

                Relation::make('Club.cin_leader')
                    ->title('CIN Chef')
                    ->required()
                    ->type('Integer')
                    ->placeholder('CIN Chef')
                    ->fromModel(User::class,'national_identity_card')
                    ->horizontal(),


                Cropper::make('Club.logo')
                    ->targetRelativeUrl()
                    ->title('logo du club')
                    ->width(700)
                    ->height(600)
                    ->horizontal(),


                Cropper::make('Club.banner')
                    ->targetRelativeUrl()
                    ->title('Grande image de banniére club')
                    ->width(1500)
                    ->height(600)
                    ->horizontal(),

                Button::make('Ajouter')
                    ->icon('check')
                    ->method('addnewclub')
                    ->canSee(!$this->exists)
                    ->type(Color::SECONDARY())
                    ->title('')
                    ->horizontal(),




            ]),
        ];
    }
    public function addnewclub(Club $club, Request $request)
    {
        $club->fill($request->get('Club'))->save(); //Club esm model

        Alert::info('Vous avez réussi à ajouter un club.');

        return redirect()->route('platform.Add_club');
    }










    public $permission = [
        'platform.Add_club'
    ];



}

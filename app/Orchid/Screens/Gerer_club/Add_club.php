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
    public $name = 'Add club';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Add club';

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
            $this->name = 'Addclub';
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
                    ->type('text')
                    ->required()
                    ->title('Name')
                    ->placeholder('Name'),

                TextArea::make('Club.description')
                    ->type('text')
                    ->required()
                    ->title('Description')
                    ->placeholder('Description'),


                Relation::make('Club.cin_leader')
                    ->title('CIN leader')
                    ->required()
                    ->placeholder('CIN leader')
                    ->fromModel(User::class, 'national_identity_card'),




                Cropper::make('Club.logo')
                    ->targetRelativeUrl()
                    ->title('Large web logo image')
                    ->width(500)
                    ->height(600),


                Cropper::make('Club.banner')
                    ->targetRelativeUrl()
                    ->title('Large web banner image')
                    ->width(1500)
                    ->height(600),

                Button::make('Add club')
                    ->icon('check')
                    ->method('addnewclub')
                    ->canSee(!$this->exists)
                    ->type(Color::SECONDARY()),




            ]),
        ];
    }
    public function addnewclub(Club $club, Request $request)
    {
        $club->fill($request->get('Club'))->save(); //Club esm model

        Alert::info('You have successfully Add club.');

        return redirect()->route('platform.Add_club');
    }
}

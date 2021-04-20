<?php

namespace App\Orchid\Screens\Gerer_User;

use App\Models\MyModels\Etudiant;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;

class AddUser extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Add User';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Add User';

    /**
     * Query data.
     *
     * @return array
     */
    public $exists = false;


    public function query(Etudiant $etudiant): array
    {
        $this->exists = $etudiant->exists;

        if($this->exists){
            $this->name = 'Adduser';
        }

        return [
            'Etudiant' => $etudiant
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
            Layout::columns([



                    Layout::rows([



                        Select::make('Etudiant.role')
                            ->required()
                            ->options([

                                'Chef' => 'chef',
                                'Membre'   => 'membre',
                                'Etudiant' => 'etudiant',
                            ])
                            ->title('Select Role'),



                        Input::make('Etudiant.national_identity_card')
                            ->type('bigInteger')
                            ->required()
                            ->title('National Identity Card')
                            ->placeholder('National Identity Card'),



                        Input::make('Etudiant.first_name')
                            ->type('text')
                            ->required()
                            ->title('First Name')
                            ->placeholder('First Name'),

                        Input::make('Etudiant.last_name')
                            ->type('text')
                               ->required()
                            ->title('Last Name')
                            ->placeholder('Last Name'),

                        Input::make('Etudiant.email')
                            ->type('email')
                            ->required()
                            ->title('Email')
                            ->placeholder('Email'),

                        Input::make('Etudiant.password')
                            ->type('password')
                            ->required()
                            ->title('password')
                            ->placeholder('password'),


                    ]),
                Layout::rows([


                    Input::make('Etudiant.f_registration_number')
                        ->type('text')
                        ->required()
                        ->title('Faculty Registration Number')
                        ->placeholder('Faculty Registration Number'),

                    Cropper::make('Etudiant.personal_image')
                        ->targetRelativeUrl()
                        ->title('Large web banner image, generally in the front and center')
                        ->width(500)
                        ->height(600),

                    Input::make('Etudiant.Date_of_Birth')
                        ->type('date')
                        ->required()
                        ->title('Date of Birth')
                        ->placeholder('Date of Birth'),

                    Input::make('Etudiant.phone_number')
                        ->type('Int')
                        ->title('Phone Number')
                        ->placeholder('Phone Number'),


                    TextArea::make('Etudiant.description')
                        ->title('Description')
                        ->rows(3)
                        ->maxlength(200)
                        ->placeholder('Description'),

                    Button::make('Add User')
                        ->icon('user-follow')
                        ->method('addnewuser')
                        ->canSee(!$this->exists)
                        ->type(Color::SECONDARY()),










                ])






                ])




        ];
    }


    public function addnewuser(Etudiant $etudiant, Request $request)
    {
        $etudiant->fill($request->get('Etudiant'))->save(); //Users esm model

        Alert::info('You have successfully Add User.');

        return redirect()->route('platform.AddUser');
    }
}

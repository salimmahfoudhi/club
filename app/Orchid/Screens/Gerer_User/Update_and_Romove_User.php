<?php

namespace App\Orchid\Screens\Gerer_User;

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







use Orchid\Screen\Fields\Quill;




class Update_and_Romove_User extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */



    public $name = 'Update_and_Remove_User';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Update_and_Remove_User';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Etudiant $etudiant
     *
     * @return array
     */
    public function query(Etudiant $etudiant): array
    {
        $this->exists = $etudiant->exists;

        if($this->exists){
            $this->name = 'Edit User ss';
        }

        $etudiant->load('attachment');


        return [
            'Etudiant' => $etudiant
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

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
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












                ])






            ])




        ];
    }

    /**
     * @param Etudiant    $etudiant
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Etudiant $etudiant, Request $request)
    {
        $etudiant->fill($request->get('Etudiant'))->save();

        $etudiant->attachment()->syncWithoutDetaching(
            $request->input('Etudiant.attachment', [])
        );

        Alert::info('You have successfully update an user.');

        return redirect()->route('platform.display_user');
    }

    /**
     * @param Etudiant $etudiant
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Etudiant $etudiant)
    {
        $etudiant->delete();

        Alert::info('You have successfully deleted the user.');

        return redirect()->route('platform.display_user');
    }
}


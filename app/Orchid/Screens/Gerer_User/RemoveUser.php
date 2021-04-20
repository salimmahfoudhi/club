<?php

namespace App\Orchid\Screens\Gerer_User;

use App\Http\Controllers\Etudiant\Update_aj;
use App\Models\MyModels\Etudiant;
use App\Models\Users;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use phpDocumentor\Reflection\Types\This;


class RemoveUser extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */



    public $name = 'Update_and_Romove_User';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Update_and_Romove_User';

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



                    Relation::make('Etudiant.national_identity_card')
                        ->title('National Identity Card')
                        ->required()

                        ->fromModel(Etudiant::class, 'national_identity_card'), //bech ijibli lista li fel bd ta3 cin



                    Button::make('Remove')
                        ->icon('trash')
                        ->method('Remove')
                        ->canSee(!$this->exists)
                        ->type(Color::SECONDARY()),













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

        return redirect()->route('platform.AddUser');
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

        return redirect()->route('platform.AddUser');
    }
}


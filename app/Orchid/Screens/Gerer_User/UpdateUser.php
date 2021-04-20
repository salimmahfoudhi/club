<?php

namespace App\Orchid\Screens\Gerer_User;

use App\Models\MyModels\Etudiant;
use App\Models\User;
use App\Orchid\Layouts\UserLayout\OneUserLayout;
use mysql_xdevapi\ColumnResult;
use mysql_xdevapi\TableSelect;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;

use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use App\Models\Users;



class UpdateUser extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'UpdateUser';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'UpdateUser';

    /**
     * Query data.
     *
     * @return array
     */
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
            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),


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






                Relation::make('Etudiant.national_identity_card')
                    ->title('National Identity Card')
                    ->required()

                    ->fromModel(Etudiant::class, 'national_identity_card'), //bech ijibli lista li fel bd ta3 cin








            ]),


        ];
    }







    public function createOrUpdate(Etudiant $etudiant, Request $request)
    {
      if(  $etudiant->fill($request->get('Users'))->save()) //Users esm model

        Alert::info('You have successfully Up User.');

        return redirect()->route('platform.UpdateUser');



    }
}

<?php

namespace App\Orchid\Layouts\Userlayout;

use App\Models\MyModels\Etudiant;
use App\Models\Users;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Orchid\Screens\Gerer_User;

use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;


class UserListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'etudiants';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [


            TD::make('id', 'Id')
                ->render(function (Etudiant $etudiant) {
                    return Link::make($etudiant->id)
                        ->route('platform.Update_and_Romove_User', $etudiant);
                }),

            TD::make('national_identity_card', 'national_identity_card')
                ->render(function (Etudiant $etudiant) {
                    return Link::make($etudiant->national_identity_card)
                        ->route('platform.Update_and_Romove_User', $etudiant);
                }),


            TD::make('role', 'Role'),

            TD::make('f_registration_number', 'Faculty Registration Number'),

            TD::make('first_name', 'First Name'),
            TD::make('last_name', 'Last Name'),
            TD::make('email', 'Email'),

            TD::make('personal_image', 'Personal Image')
                ->width('150')
                ->render(function (Etudiant $etudiant) {

                    return "<img src='{$etudiant->personal_image}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>";
                }),


            TD::make('Date_of_Birth', 'Date of Birth'),
            TD::make('phone_number', 'Phone_Number'),
            TD::make('description', 'Description'),
            TD::make('state', 'State'),


        ];
    }


}

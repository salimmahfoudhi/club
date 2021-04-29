<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Platform\Models\User;


use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

use Illuminate\Http\Request;

use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;


class UserEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return array
     */

    public function fields(): array
    {
        return [


              Input::make('user.national_identity_card')
                ->type('bigInteger')
                ->required()
                ->max(9)
                ->title('Carte d\'identité')
                ->placeholder('CIN'),

            Input::make('user.f_registration_number')
                ->type('text')
                ->max(15)
                ->required()
                ->title('Numéro d\'inscription de la faculté')
                ->placeholder('Numéro d\'inscription de la faculté'),


            Input::make('user.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Nom'))
                ->placeholder(__('Nom')),

            Input::make('user.last_name')
                ->type('text')
                ->max(255)
                 ->required()
                ->title('Prénom')
                ->placeholder('Prénom'),











            Cropper::make('user.personal_image')
                ->targetRelativeUrl()
                ->title('Grande image de photo personnelle Web, ')
                ->width(500)
                ->height(500),

                Input::make('user.Date_of_Birth')
                ->type('date')
                ->required()
                ->title('Date de naissance')
                ->placeholder('Date de naissance'),

            Input::make('user.phone_number')
                ->type('tel')
                ->max(12)
                ->title('numéro de téléphone')
                ->placeholder('numéro de téléphone'),


            TextArea::make('user.description')
                ->title('Description')
                ->rows(3)
                ->max(255)
                ->maxlength(200)
                ->placeholder('Description'),

            Select::make('user.state')
                ->required()
                ->title('État')
                ->options([

                    '1'  => 'activate',
                    '0' => 'Deactivate' ,




                ]),
             Input::make('user.email')
                 ->type('email')
                 ->required()
                 ->max(255)
                 ->title(__('Email'))
                 ->placeholder(__('Email')),





        ];
    }
}

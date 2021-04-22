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
                ->title('National Identity Card')
                ->placeholder('National Identity Card'),

            Input::make('user.f_registration_number')
                ->type('text')
                ->max(15)
                ->required()
                ->title('Faculty Registration Number')
                ->placeholder('Faculty Registration Number'),


            Input::make('user.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('First Name'))
                ->placeholder(__('First Name')),

            Input::make('user.last_name')
                ->type('text')
                ->max(255)
                 ->required()
                ->title('Last Name')
                ->placeholder('Last Name'),











            Cropper::make('user.personal_image')
                ->targetRelativeUrl()
                ->title('Large web personal photo image, generally in the front and center')
                ->width(500)
                ->height(500),

                Input::make('user.Date_of_Birth')
                ->type('date')
                ->required()
                ->title('Date of Birth')
                ->placeholder('Date of Birth'),

            Input::make('user.phone_number')
                ->type('tel')
                ->max(12)
                ->title('Phone Number')
                ->placeholder('Phone Number'),


            TextArea::make('user.description')
                ->title('Description')
                ->rows(3)
                ->max(255)
                ->maxlength(200)
                ->placeholder('Description'),

            Select::make('user.state')
                ->required()
                ->title('State')
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

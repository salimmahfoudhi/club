<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class UserListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'users';

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            TD::make('name', __('Name'))
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                    return new Persona($user->presenter());
                }),
           /*  ->render(function (User $user) {

                 return "<img src='{$user->personal_image}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>";
             }),*/

            TD::make('last_name', 'Last Name'),

            TD::make('national_identity_card', 'CIN')


               ,
            TD::make('f_registration_number', 'Faculty Registration Number'),



            TD::make('email', __('Email'))
                ->sort()
                ->cantHide()

                ->render(function (User $user) {
                    return ModalToggle::make($user->email)
                        ->modal('oneAsyncModal')
                        ->modalTitle($user->presenter()->title())
                        ->method('saveUser')
                        ->asyncParameters([
                            'user' => $user->id,
                        ]);
                }),


            TD::make('Date_of_Birth', 'Date of Birth'),
            TD::make('phone_number', 'Phone_Number'),
            TD::make('description', 'Description'),
            TD::make('state', 'State'),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(function (User $user) {
                    return $user->updated_at->toDateTimeString();
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (User $user) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Edit'))
                                ->route('platform.systems.users.edit', $user->id)
                                ->icon('pencil'),

                            Button::make(__('Delete'))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->parameters([
                                    'id' => $user->id,
                                ]),
                        ]);
                }),
        ];
    }



}

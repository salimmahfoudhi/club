<?php

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return ItemMenu[]
     */
    public function registerMainMenu(): array
    {
        return [



            ItemMenu::label('Users')
                ->slug('Users')
                ->icon('people')
                ->title('Gérer')
                ->withChildren(),

            ItemMenu::label('Display User')
                ->route('platform.systems.users')
                ->place('Users')
                ->icon('people'),




            ItemMenu::label('Add Users')
                ->route('platform.systems.users.create')
                ->icon('user-follow')
                ->place('Users'),




//clubs

            ItemMenu::label('Clubs')
                ->slug('Clubs')
                ->icon('orchid-old')
                ->withChildren(),

            ItemMenu::label('Display Clubs')
                ->route('platform.display_club')
                ->place('Clubs'),
               // ->icon('people'),

            ItemMenu::label('Add club')
                ->route('platform.Add_club')
             //   ->icon('user-follow')
                ->place('Clubs'),



            //publication

            ItemMenu::label('Publications')
                ->slug('Publications')
                ->icon('star')
                ->withChildren(),

            ItemMenu::label('Display Publication')
                ->route('platform.Display_publication')
                ->place('Publications'),
            //    ->icon('people'),

            ItemMenu::label('Add Publication')
                ->route('platform.Add_publication')
              //  ->icon('user-follow')
                ->place('Publications'),

















            ItemMenu::label('Example ')
                ->icon('monitor')
                ->route('platform.example')
                ->title('Navigation')
                ->badge(function () {
                    return 6;
                }),



            ItemMenu::label('Basic Elements')
                ->title('Form controls')
                ->icon('note')
                ->route('platform.example.fields'),

            ItemMenu::label('Advanced Elements')
                ->icon('briefcase')
                ->route('platform.example.advanced'),

            ItemMenu::label('Text Editors')
                ->icon('list')
                ->route('platform.example.editors'),

            ItemMenu::label('Overview layouts')
                ->title('Layouts')
                ->icon('layers')
                ->route('platform.example.layouts'),

            ItemMenu::label('Chart tools')
                ->icon('bar-chart')
                ->route('platform.example.charts'),

            ItemMenu::label('Cards')
                ->icon('grid')
                ->route('platform.example.cards'),

            ItemMenu::label('Documentation')
                ->title('Docs')
                ->icon('docs')
                ->url('https://orchid.software/en/docs'),

            ItemMenu::label('Changelog')
                ->icon('shuffle')
                ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
                ->badge(function () {
                    return Dashboard::version();
                }, Color::DARK()),
        ];
    }

    /**
     * @return ItemMenu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            ItemMenu::label('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemMenu[]
     */
    public function registerSystemMenu(): array
    {
        return [
            ItemMenu::label(__('Access rights'))
                ->icon('lock')
                ->slug('Auth')
                ->active('platform.systems.*')
                ->permission('platform.systems.index')
                ->sort(1000),

            ItemMenu::label(__('Users'))
                ->place('Auth')
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->sort(1000)
                ->title(__('All registered users')),

            ItemMenu::label(__('Roles'))
                ->place('Auth')
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->sort(1000)
                ->title(__('A Role defines a set of tasks a user assigned the role is allowed to perform.')),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('Systems'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }

    /**
     * @return string[]
     */
    public function registerSearchModels(): array
    {
        return [
            // ...Models
            // \App\Models\User::class
        ];
    }
}

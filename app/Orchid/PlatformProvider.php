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
                ->permission('platform.systems.users')
                ->withChildren(),

            ItemMenu::label('Afficher utilisateurs')
                ->route('platform.systems.users')
                ->place('Users')
                ->icon('people'),




            ItemMenu::label('Ajouter Users')
                ->route('platform.systems.users.create')
                ->icon('user-follow')
                ->place('Users'),




//clubs

          /*  ItemMenu::label('Clubs')
                ->slug('Clubs')
                ->icon('orchid-old')
              //  ->permission('clubs')
                ->withChildren(),*/





            ItemMenu::label('Clubs')
                ->slug('Clubs')
                ->icon('orchid-old')
                ->permission('platform.Add_club')

                ->withChildren(),


            ItemMenu::label(__('Afficher Clubs'))
                ->place('Clubs')

                ->route('platform.display_club')
                ->permission('platform.display_club')
                ->sort(1000),


            ItemMenu::label(__('Ajouter club'))
                ->place('Clubs')

                ->route('platform.Add_club')
                ->permission('platform.Add_club')
                ->sort(1000),
             //   ->title(__('A Role defines a set of tasks a user assigned the role is allowed to perform.')),




            //publication

            ItemMenu::label('Publications')
                ->slug('Publications')
                ->permission('platform.Add_publication')
                ->icon('star')
                ->withChildren(),

            ItemMenu::label('Afficher Publications')
                ->route('platform.Display_publication')
                ->place('Publications')
                ->permission('platform.Display_publication')
                ->sort(1000),
            //    ->icon('people'),



            ItemMenu::label('Ajouter Publication')
                ->route('platform.Add_publication')
              //  ->icon('user-follow')
                ->place('Publications')
                ->permission('platform.Add_publication')
                ->sort(1000),

            ItemMenu::label('CodeIns')
                ->slug('CodeIns')
                ->permission('platform.Add_Codeins')
                ->icon('star')
                ->withChildren(),



            ItemMenu::label('Ajouter CodeIns')
                ->route('platform.Add_Codeins')
                //  ->icon('user-follow')
                ->place('CodeIns')
                ->permission('platform.Add_Codeins')
                ->sort(1000),







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
                ->addPermission('platform.systems.users', __('Users'))
           ,
            ItemPermission::group(__('clubs'))
                ->addPermission('platform.Add_club', 'Ajouter Club')
                ->addPermission('platform.display_club', 'Afficher Clubs'),

            ItemPermission::group(__('Users'))
                ->addPermission('platform.Add_publication', 'Ajouter Publication')
                ->addPermission('platform.Display_publication', 'Afficher Publications')
               ,


            ItemPermission::group(__('Code Ins'))
                ->addPermission('platform.Add_Codeins', 'Ajouter Code Ins')
             ,

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

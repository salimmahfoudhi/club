<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{users}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Edit'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{roles}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

// Example...

  // edite , update , remove

Route::screen('AddUser',\App\Orchid\Screens\Gerer_User\AddUser::class)->name('platform.AddUser');

Route::screen('displayuser',\App\Orchid\Screens\Gerer_User\display_user::class)->name('platform.display_user');
Route::screen('RemoveUser/{displayuser?}',\App\Orchid\Screens\Gerer_User\RemoveUser::class)->name('platform.RemoveUser');
Route::screen('UpdateUser/{displayuser?}',\App\Orchid\Screens\Gerer_User\UpdateUser::class)->name('platform.UpdateUser');

Route::screen('Addclub',\App\Orchid\Screens\Gerer_club\Add_club::class)->name('platform.Add_club');
Route::screen('displayclub',\App\Orchid\Screens\Gerer_club\display_club::class)->name('platform.display_club');

Route::screen('Add_publication',\App\Orchid\Screens\Gerer_Publication\Add_publication::class)->name('platform.Add_publication');
Route::screen('Display_publication',\App\Orchid\Screens\Gerer_Publication\Display_publication::class)->name('platform.Display_publication');
Route::screen('UpdatePublication',\App\Orchid\Screens\Gerer_Publication\Update_Pub::class)->name('platform.UpdatePub');

Route::screen('RemovePubication',\App\Orchid\Screens\Gerer_Publication\Update_Pub::class)->name('platform.RemovePub');

Route::screen('UpdateClub',\App\Orchid\Screens\Gerer_club\Update_Club::class)->name('platform.UpdateClub');
Route::screen('RemoveClub',\App\Orchid\Screens\Gerer_club\Remove_Club::class)->name('platform.RemoveClub');
Route::screen('Add_CodeIns',\App\Orchid\Screens\Gerer_codeins\AddCodeIns::class)->name('platform.Add_Codeins');


Route::screen('RemoveUpdateUser/{displayuser?}',\App\Orchid\Screens\Gerer_User\Update_and_Romove_User::class)
         ->name('platform.Update_and_Romove_User');


Route::screen('RemoveUpdateClub/{displayclub?}',\App\Orchid\Screens\Gerer_club\Update_and_Remove_Club::class)
    ->name('platform.Update_and_Remove_Club');


Route::screen('RemoveUpdatePub/{Display_publication?}',\App\Orchid\Screens\Gerer_Publication\Update_And_Remove_Pub::class)
    ->name('platform.Update_And_Remove_Pub');



//Route::screen('update_etu/{displayuser?}',\App\Orchid\Screens\update_etu::class)
  //       ->name('platform.update_etu');





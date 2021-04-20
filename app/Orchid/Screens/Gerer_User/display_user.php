<?php
namespace App\Orchid\Screens\Gerer_User;

use App\Http\Controllers\Controller;
use App\Models\MyModels\Etudiant;
use App\Orchid\Layouts\Userlayout\UserListLayout;
use Orchid\Screen\Screen;





use App\Orchid\Layouts\Userlayout;

use Orchid\Screen\Actions\Link;




class display_user extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'display_user';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Display User';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'etudiants' => Etudiant::paginate()
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
            Link::make('add user')
                ->icon('pencil')
                ->route('platform.AddUser')
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

            UserListLayout::class


        ];
    }
}

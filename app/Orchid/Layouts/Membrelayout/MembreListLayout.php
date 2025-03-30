<?php

namespace App\Orchid\Layouts\Membrelayout;

use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\MyModels\Club;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Alert;
use App\Models\Clubetudiant;


class MembreListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'clubetudiants';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [

       
	

            TD::make('created_at','Date of publication'),
 





       ];
    }


}

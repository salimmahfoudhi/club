<?php

namespace App\Orchid\Layouts\Publicationlayout;




use App\Orchid\Filters\PubFilter;
use App\Orchid\Filters\RoleFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class PubFiltersLayout extends Selection
{
    /**
     * @return string[]|Filter[]
     */
    public function filters(): array
    {
        return [
            RoleFilter::class,
        ];
    }
}

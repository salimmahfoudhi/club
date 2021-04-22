<?php

namespace App\Models\MyModels;

use Orchid\Filters\Filterable;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;


class Club extends Model
{

    use AsSource,Attachable,Filterable;




    public  $table='clubs';

    protected  $fillable=[

        'name',
        'description',
        'cin_leader',
        'logo',
        'banner',

    ];

    protected $allowedFilters = [
        'name',
        'description',
        'cin_leader',
        'logo',
        'banner',
    ];

    /**
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'description',
        'cin_leader',
        'logo',
        'banner',
    ];



    public $timestamps=false;

}

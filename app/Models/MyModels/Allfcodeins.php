<?php

namespace App\Models\MyModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Allfcodeins extends Model

{

    use AsSource,Attachable,Filterable;




    public  $table='allfcodeins';

    protected  $fillable=[

        'CodeIns',


    ];

    protected $allowedFilters = [
        'CodeIns',

    ];

    /**
     * @var array
     */
    protected $allowedSorts = [
        'CodeIns',

    ];



    public $timestamps=false;



}

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
        'id',
        'CodeIns',
        'national_identity_card',


    ];

    protected $allowedFilters = [
        'id',
        'CodeIns',
        'national_identity_card',
    ];

    /**
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'CodeIns',
        'national_identity_card',
    ];



    public $timestamps=false;



}

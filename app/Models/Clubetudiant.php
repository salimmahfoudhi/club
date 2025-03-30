<?php

namespace App\Models;

use Orchid\Filters\Filterable;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;


class Clubetudiant extends Model
{

    use AsSource,Attachable,Filterable;




    public  $table='clubetudiants';

    protected  $fillable=[

        'id_etudiant',
        'id_club',
        'etat',

    ];

    protected $allowedFilters = [
        'id_etudiant',
        'id_club',
        'etat',
    ];

    /**
     * @var array
     */
    protected $allowedSorts = [
        'id_etudiant',
        'id_club',
        'etat',
    ];



    public $timestamps=false;

}

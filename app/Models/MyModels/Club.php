<?php

namespace App\Models\MyModels;


use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
class Club extends Model
{

    use AsSource, Attachable;

   public  $table='clubs';

    protected  $fillable=[

        'name',
        'description',
        'id_leader',
        'logo',
        'banner',

    ];

    public $timestamps=false;

}

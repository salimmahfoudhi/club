<?php

namespace App\Models\MyModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;

class Publication extends Model
{
    use AsSource, Attachable;

    public $table='publications';

    protected  $fillable=[

       'type',
        'banner',
        'description',
        'created_at',
        'updated_at',
        'id_publisher',
    ];

  //  public $timestamps=false;

}

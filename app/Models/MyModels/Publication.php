<?php

namespace App\Models\MyModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;

use Orchid\Filters\Filterable;


class Publication extends Model
{
    use AsSource, Attachable,Filterable;

    public $table='publications';

    protected  $fillable=[

       'type',
        'banner',
        'description',
        'created_at',
        'updated_at',
        'cin_publisher',
    ];

    protected $allowedFilters = [
        'id',
        'type',
        'banner',
        'description',
        'created_at',
        'updated_at',
        'cin_publisher',
    ];

    /**
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'type',
        'banner',
        'description',
        'created_at',
        'updated_at',
        'cin_publisher',
    ];

  //  public $timestamps=false;

}

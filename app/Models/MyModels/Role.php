<?php

namespace App\Models\Mymodels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    public $table='roles';

    protected  $fillable=[

        'id',
        'name',

    ];
}

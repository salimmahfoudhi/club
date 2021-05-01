<?php

namespace App\Models\Mymodels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    use HasFactory;


    public $table='role_users';

    protected  $fillable=[

        'user_id',
        'role_id',

    ];
}

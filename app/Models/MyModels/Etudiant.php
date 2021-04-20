<?php

namespace App\Models\MyModels;


use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;



use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;


class Etudiant extends Model
{


    use AsSource, Attachable;


    public $table='etudiants';

    protected  $fillable=[

        'role',
        'first_name' ,
        'last_name',
        'personal_image',
        'email',
        'password',

        'national_identity_card',
        'f_registration_number',
        'Date_of_Birth',
        'phone_number',
        'description',
        'state',
    ];

    public $timestamps=false;
}

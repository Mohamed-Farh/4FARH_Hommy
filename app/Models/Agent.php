<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agents';

    protected $primaryKey = 'id';

    protected $fillable =[

         'photo',
         'name_ar',
         'name_en',
         'phone',
         'ex_years',
         'position_ar',
         'position_en',
         'about_ar',
         'about_en',
         'email',
         'facebook',
         'twitter',
         'linked_in',
    ];
}

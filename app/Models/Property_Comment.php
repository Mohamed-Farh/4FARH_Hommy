<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property_Comment extends Model
{
    protected $table = 'property_comments';

    protected $primaryKey = 'id';

    protected $fillable =[

         'property_comment',
         'property_id',
         'status',
         'file',
   ];
}

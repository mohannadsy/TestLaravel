<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bransh extends Model
{
    protected $fillable=[
        'name'           ,
        'main_bransh_id'    , //الفرع الرئيسي للفرح الحالي
        'resposability'  ,
        'address'        ,
        'website'        ,
        'email'          ,
        'phone'          ,
        'mobile'         ,
    ];



    use HasFactory;
}

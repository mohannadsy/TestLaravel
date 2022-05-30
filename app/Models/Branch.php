<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable=[
        'name'           ,
        'main_branch_id'    , //الفرع الرئيسي للفرح الحالي
        'responsibility'  ,
        'address'        ,
        'website'        ,
        'email'          ,
        'phone'          ,
        'mobile'         ,
    ];



    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'latin_name',
        'equality', // تعادل
        'match',// مكافئ
        'part',
        'accuracy',
        'lain_part_name',
        'photo',
        'create_at',
        'security_degree',


    ];
    protected $hidden = ['updated_at'];
}

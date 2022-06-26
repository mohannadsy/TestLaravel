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
        ];
    protected $hidden = ['created_at', 'updated_at'];
}

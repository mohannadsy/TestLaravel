<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'notes',
        'photo',
        'gender',
        'nationality',
        'work',
        'birth_place',
        'birth_data',
        'address',
        'email_code',
        'email',
        'phone',
        'mobile',
        'fax',
        'default_price',
        'discount_rate',
        'discount_account'

    ];
}

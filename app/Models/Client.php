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

        'gender', // الجنس
        'nationality', // الجنسية
        'work',
        'birth_place',
        'birth_data',
        'record_number', // رقم السجل
        'address',
        'email_prefix',
        'phone',
        'mobile',
        'fax',
        'email',
        'default_price',
        'discount_rate',
        'discount_account',
        'payment_conditions',
        'account_id'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'client_id');
    }}

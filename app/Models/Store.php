<?php

namespace App\Models;

use Database\Seeders\ItemSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable=[
        'code',
        'name',
        'latin_name',
        'type',
        'store_id',
        'account_id',
        'address',
        'store_keeper',
        'storage_amount',
        'website',
        'photo',
        'notes',
        'is_active',
        'security_degree',
    ];
    public function stores()
    {
        return $this->hasMany(Store::Class, 'store_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::Class, 'store_id');
    }
    public function accounts()
    {
        return $this->hasMany(Account::Class ,'account_id');
    }
    public function items()
    {
        return $this->hasMany(Item::Class ,'store_id');
    }
    use HasFactory;
}

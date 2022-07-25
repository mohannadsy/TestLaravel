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


        // updates : add branch in all cards
        'branch_id'
    ];
    public function stores()
    {
        return $this->hasMany(Store::Class, 'store_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::Class, 'store_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    use HasFactory;
}

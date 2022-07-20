<?php

namespace App\Models;

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
        'nodes',
        'is_active',
        'confidentiality_degree',
    ];
    public function stores()
    {
        return $this->hasMany('App\Models\Store', 'store_id');
    }
    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'store_id');
    }
    public function accounts()
    {
        return $this->hasMany('App\Model\Account','account_id');
    }

    use HasFactory;
}

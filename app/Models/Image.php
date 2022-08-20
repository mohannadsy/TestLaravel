<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'name', 'type', 'table', 'table_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'image_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'image_id');
    }



    public function account()
    {
        return $this->belongsTo(Account::class, 'image_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'image_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'image_id');
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class, 'image_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'image_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'image_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'image_id');
    }

}

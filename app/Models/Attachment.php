<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'name', 'type', 'table','table_id'];


    public function branch()
    {
        return $this->belongsTo(Branch::class, 'attachment_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'attachment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'attachment_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'attachment_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'attachment_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'attachment_id');
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class, 'attachment_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'attachment_id');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'attachment_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'attachment_id');
    }

}

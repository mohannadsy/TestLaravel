<?php

namespace App\Models;

use Database\Seeders\AttachmentSeeder;
use Database\Seeders\ItemSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
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
        'branch_id',
        'store_id',
        'attachment_id'
    ];

    protected $casts = [
        'attachment_id' => 'array',

    ];

    public function stores()
    {
        return $this->hasMany(Store::Class, 'store_id')->with('stores')->select('id', 'name', 'code', 'store_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::Class, 'store_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function items()
    {
        return $this->hasMany(Item::Class, 'store_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'attachment_id');
    }



    use HasFactory;
}

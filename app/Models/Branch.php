<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Branch extends Model
{
    use HasFactory;

    protected $table = "branches";

    protected $fillable = [
        'code',
        'name',
        'branch_id',
        'responsibility',
        'address',
        'website',
        'email',
        'phone',
        'mobile',
        'is_active',
        'security_degree',
        'attachment_id',


    ];

    protected $casts = [
        'attachment_id' => 'array',

    ];


    public function branches()
    {
        return $this->hasMany(Branch::class, 'branch_id')->with('branches', 'users')->select('id', 'name', 'code', 'branch_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'branch_id')->select('id', 'name', 'code', 'branch_id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id');
    }


    public function onlyBranches()
    {
        return $this->hasMany('App\Models\Branch', 'branch_id');
    }


    public function branchesWithInternalBranches()
    {
        return $this->hasMany(Branch::class, 'branch_id')->with('branches');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'branch_id');
    }

    public function onlyUsers()
    {
        return $this->hasMany('App\Models\User', 'branch_id');
    }

    public function costCenters()
    {
        return $this->hasMany(CostCenter::class, 'branch_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'branch_id');
    }

    public function accounts()
    {
        return $this->hasMany(Account::class, 'branch_id');
    }

    public function stores()
    {
        return $this->hasMany(Store::class, 'branch_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'branch_id');
    }

    public function attachment()
    {
        return $this->hasOne(Attachment::class, 'attachment_id');
    }


}

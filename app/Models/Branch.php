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
    ];
    public function branches()
    {
        return $this->hasMany('App\Models\Branch', 'branch_id')->with(['branches', 'users'])->select('id', 'name', 'code', 'branch_id');
    }
    public function users()
    {
        return $this->hasMany('App\Models\User', 'branch_id')->select('id', 'name', 'code', 'branch_id');
    }
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id');
    }
    public function onlyBranches()
    {
        return $this->hasMany('App\Models\Branch', 'branch_id');
    }
    public function onlyUsers()
    {
        return $this->hasMany('App\Models\User', 'branch_id');
    }
}

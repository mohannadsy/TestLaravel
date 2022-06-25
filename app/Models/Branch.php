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
        'center_id',
        'responsibility',
        'address',
        'website',
        'email',
        'phone',
        'mobile',
    ];

    public function branches()
    {
        return $this->hasMany('App\Models\Branch', 'branch_id')->with(['branches', 'users']);
    }
    public function users()
    {
        return $this->hasMany('App\Models\User', 'branch_id')->with('permissions');
    }
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id');
    }
    public function cost_center()
    {
        return $this->belongsTo('App\Models\CostCenters', 'branch_id');
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

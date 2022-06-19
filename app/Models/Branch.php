<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    ];

    public function branches()
    {
        return $this->hasMany('App\Models\Branch', 'branch_id')->with(['branches', 'users']);
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'branch_id')->with('permissions');
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

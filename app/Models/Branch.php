<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Branch extends Model
{
    use HasFactory;

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

    public function users()
    {
        return $this->hasMany('App\Models\User','branch_id');
    }

    public function branches()
    {
        return $this->hasMany('App\Models\Branch','branch_id');
    }


}

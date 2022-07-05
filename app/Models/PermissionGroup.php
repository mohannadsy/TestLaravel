<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name','caption'];
    protected $hidden = ['created_at', 'updated_at'];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'permission_group_id');

    }


    protected $casts = [
        'caption' => 'array',
    ];
}

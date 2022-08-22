<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use App\Models\Branch;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasRoles;
    use TwoFactorAuthenticatable;

//    use SoftDeletes;


    protected $fillable = [
        'code',
        'name',
        'email',
//        'password',

        'role', // الصفة
        'branch_id',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'mobile',
        'id_number',
        'profile_photo_path',
        'notes',
        'account-box_id',
        'store_id',
        'is_active',


        'security_degree',

        'security_level',
    ];

    protected $hidden = [
        'pivot',
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'profile_photo_url',


    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id')->select('code','name','branch_id');
    }


    protected $appends = [
        'profile_photo_url',
    ];
}

<?php

namespace App\Traits\User;

use App\Models\User;

trait  AdminTrait
{


    public function isSuperAdmin($id)
    {
        $user = User::find($id);
        return $id == 1 && $user->is_active == true;
    }

    public function isNotSuperAdmin($id)
    {
        return !$this->isSuperAdmin($id);
    }

}

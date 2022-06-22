<?php

namespace App\Traits\User;

trait  AdminTrait {


    public function isSuperAdmin($id)
    {
        return $id == 1;
    }

    public function isNotSuperAdmin($id)
    {
        return !$this->isSuperAdmin($id);
    }

}

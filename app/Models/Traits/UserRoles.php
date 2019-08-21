<?php

namespace App\Models\Traits;

use App\Role;

trait UserRoles
{
//    public function getRolesList()
//    {
//        return $this->roles()->get()->pluck('id', 'id')->toArray();
//    }
    public function getRolesStringAttribute()
    {
        return implode(', ', $this->roles()->get()->pluck('name', 'id')->toArray());
    }

    /*
     * If User is given role type
     * @param string $role
     * @return bool
     */
//    public function hasRole($role = 'web')
//    {
//        return ($this->roles()->where('keyword', $role)->first() ? true : false);
//    }
}

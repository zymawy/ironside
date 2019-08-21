<?php

namespace App\Models\Traits;

use App\Role;

trait UserAdmin
{
    /**
     * If User is base admin
     * On /admin login validation and all /admin navigation.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole(Role::$ADMINISTRATOR);
    }

    /**
     * If User is admin.
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole(Role::$SUPERADMINISTRATOR);
    }

    /**
     * If User is admin.
     *
     * @return bool
     */
    public function isUser()
    {
        return $this->hasRole(Role::$USER);
    }
}

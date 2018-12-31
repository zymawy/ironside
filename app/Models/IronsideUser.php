<?php

namespace App\Models;

use App\Models\Traits\UserAdmin;
use App\Models\Traits\UserHelper;
use App\Models\Traits\UserRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
class IronsideUser extends Authenticatable
{
    use Notifiable, SoftDeletes, UserHelper,LaratrustUserTrait, UserRoles;

}

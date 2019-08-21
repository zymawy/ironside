<?php

namespace App\Models;

use App\Models\Traits\UserHelper;
use App\Models\Traits\UserRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class IronsideUser extends Authenticatable
{
    use Notifiable, SoftDeletes, UserHelper,LaratrustUserTrait, UserRoles;
}

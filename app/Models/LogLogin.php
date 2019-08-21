<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogLogin extends Model
{
    protected $table = 'log_logins';

    protected $guarded = ['id'];

    /**
     * Make the update_at do nothing.
     *
     * @return array
     */
    public function setUpdatedAtAttribute($value)
    {
        // Do nothing.
    }
}

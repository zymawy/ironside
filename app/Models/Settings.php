<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting.
 *
 * @mixin \Eloquent
 */
class Settings extends IronsideCMSModel
{
    use SoftDeletes;

    protected $table = 'settings';

    protected $guarded = ['id'];

    /**
     * Validation rules for this model.
     */
    public static $rules = [
        'name'        => 'required|min:3:max:255',
        'description' => 'required|min:3:max:2000',
    ];
}

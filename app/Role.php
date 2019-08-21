<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    use SoftDeletes;

    public static $USER = 'user';

    public static $SUPERADMINISTRATOR = 'superadministrator';

    public static $ADMINISTRATOR = 'administrator';

    protected $table = 'roles';
    protected $guarded = ['id'];

    /**
     * Validation rules for this model.
     */
    public static $rules = [
        'name' => 'required|min:3:max:255',
    ];
    /**
     * Validation rules for this model.
     */
    public static $messages = [
        'name.required' => 'dasfas',
    ];

    public function getIconTitleAttribute()
    {
        return '<i class="fa fa-'.$this->attributes['icon'].'"</i> '.$this->attributes['name'];
    }

    public function getTitleSlugAttribute()
    {
        return $this->attributes['name'].' ('.$this->attributes['slug'].')';
    }

    /**
     * Get all the rows as an array (ready for dropdowns).
     *
     * @return array
     */
    public static function getAllLists()
    {
        return self::orderBy('name')->get()->pluck('name', 'id')->toArray();
    }
}

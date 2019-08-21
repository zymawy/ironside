<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends IronsideCMSModel
{
    use SoftDeletes, HasTranslations;
    protected $table = 'countries';
    protected $guarded = ['id'];
    /**
     * Validation rules for this model.
     */
    public static $rules = [
        'title' => 'required|min:3:max:255',
    ];

    public $translatable = [
        'title',
    ];

    /**
     * Get all the rows as an array (ready for dropdowns).
     *
     * @return array
     */
    public static function getAllLists()
    {
        return self::orderBy('title')->get()->pluck('title', 'id')->toArray();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Suburb extends IronsideCMSModel
{
    use SoftDeletes, HasTranslations;
    protected $table = 'suburbs';
    protected $guarded = ['id'];
    /**
     * Validation rules for this model.
     */
    public static $rules = [
        'title'   => 'required|min:3:max:255',
        'city_id' => 'required|exists:cities,id',
    ];

    public $translatable = [
        'title',
    ];

    /**
     * Get the province.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

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

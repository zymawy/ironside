<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use App\Models\Traits\Photoable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PhotoAlbum.
 *
 * @mixin \Eloquent
 */
class PhotoAlbum extends IronsideCMSModel
{
    use SoftDeletes, HasSlug, Photoable;

    protected $table = 'photo_albums';

    protected $guarded = ['id'];

    /**
     * Validation rules for this model.
     */
    public static $rules = [
        'name' => 'required|min:3:max:255',
    ];

    /**
     * Get all the rows as an array (ready for dropdowns).
     *
     * @return array
     */
    public static function getAllList()
    {
        return self::orderBy('name')->get()->pluck('name', 'id')->toArray();
    }
}

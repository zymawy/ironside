<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NewsCategory.
 *
 * @mixin \Eloquent
 */
class NewsCategory extends IronsideCMSModel
{
    use SoftDeletes,HasSlug;

    protected $table = 'news_categories';

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

    /**
     * Get the articles.
     */
    public function news()
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}

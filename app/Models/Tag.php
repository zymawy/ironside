<?php

namespace App\Models;

use App\Models\IronsideCMSModel;
use Bpocallaghan\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends IronsideCMSModel
{
    use SoftDeletes, HasSlug;

    protected $table = 'tags';

    protected $guarded = ['id'];

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'name' => 'required|min:2:max:255',
    ];

	/**
	 * Get the Photo many to many
	 */
	public function photos()
	{
		return $this->belongsToMany(Photo::class);
	}
}
<?php

namespace App\Models;

use App\Models\Traits\Documentable;
use App\Models\Traits\ImageThumb;
use App\Models\Traits\Photoable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PageContent.
 *
 * @mixin \Eloquent
 */
class PageContent extends IronsideCMSModel
{
    use SoftDeletes, Documentable, Photoable, ImageThumb;

    protected $table = 'page_content';

    protected $guarded = ['id'];

    public $imageColumn = 'media';

    public static $alignments = [
        //'bottom' => 'Bottom',
        //'center' => 'Center',
        'left'  => 'Left',
        'right' => 'Right',
        'top'   => 'Top',
    ];

    /**
     * Validation rules for this model.
     */
    public static $rules = [
        'heading'         => 'nullable|min:3:max:255',
        'heading_element' => 'required|max:2',
        'content'         => 'nullable|max:8000',
        'page_id'         => 'required|exists:pages,id',
        'caption'         => 'nullable|max:240',
        'media'           => 'nullable|image|max:3000|mimes:jpg,jpeg,png,bmp',
        'media_align'     => 'required|max:20',
    ];

    /**
     * Get the heading name.
     *
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->heading;
    }

    /**
     * Get the summary text.
     *
     * @return mixed
     */
    public function getSummaryAttribute()
    {
        return substr(strip_tags($this->attributes['content']), 0, 120).'...';
    }

    /**
     * Get the Page many to many.
     */
    public function pages()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the Page many to many.
     */
    public function component()
    {
        return $this->belongsTo(Page::class);
    }
}

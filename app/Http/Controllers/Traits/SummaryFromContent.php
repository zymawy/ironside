<?php

namespace App\Http\Controllers\Traits;

trait SummaryFromContent
{
    /**
     * Get the summary text.
     *
     * @return mixed
     */
    public function getSummaryAttribute()
    {
        $value = $this->attributes['summary'];

        return strip_tags(strlen($value) > 5 ? $value : substr($this->attributes['content'], 0,
            200));
    }
}

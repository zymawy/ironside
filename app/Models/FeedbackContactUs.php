<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackContactUs extends Model
{
    protected $table = 'feedback_contact_us';

    protected $guarded = ['id'];

    public function getFullnameAttribute()
    {
        return $this->attributes['firstname'].' '.$this->attributes['lastname'];
    }

    /**
     * Validation custom messages for this model.
     */
    public static $rules = [
        'firstname' => 'required|min:2:max:255',
        'lastname'  => 'required|min:2:max:255',
        'email'     => 'required|min:2:max:255|email',
        'content'   => 'required|min:2:max:1000',
        'phone'     => 'nullable|max:20',
    ];
}

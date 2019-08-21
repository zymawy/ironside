<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NewsletterSubscriber.
 *
 * @mixin \Eloquent
 */
class NewsletterSubscriber extends IronsideCMSModel
{
    use SoftDeletes;

    protected $table = 'newsletter_subscribers';

    protected $guarded = ['id'];

    /**
     * Validation rules for this model.
     */
    public static $rules = [
        'fullname' => 'required|max:240',
        'email'    => 'required|email|unique:newsletter_subscribers',
    ];
}

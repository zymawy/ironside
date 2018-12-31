<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IronsidePhoto extends Model
{
    protected $guarded = ['id'];

    protected $baseDir = 'uploads/images';
}
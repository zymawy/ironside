<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 1/1/19
 * Time: 5:36 AM
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Impersonate extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'impersonate';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 12/26/18
 * Time: 8:15 AM.
 */

namespace App\Http\Controllers\Website\Account;

use App\Http\Controllers\Website\WebsiteController;
use Bpocallaghan\FAQ\Models\FAQ;

class AccountController extends WebsiteController
{
    public function index()
    {
        //$faq = FAQ::whereHas('category', function($query) {
        //    return $query->where('name', 'Account');
        //})->orderBy('list_order')->get();
        // , compact('faq')
        return $this->view('account.account');
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 12/26/18
 * Time: 8:15 AM
 */

namespace App\Http\Controllers\Website\Account;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bpocallaghan\FAQ\Models\FAQ;
use App\Http\Controllers\Website\WebsiteController;
class AccountController extends  WebsiteController
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
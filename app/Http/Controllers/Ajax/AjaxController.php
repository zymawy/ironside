<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $clientIp;

    protected $clientAgent;

    public function __construct(Request $request)
    {
        $this->clientIp = $request->getClientIp();
        $this->clientAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    }
}

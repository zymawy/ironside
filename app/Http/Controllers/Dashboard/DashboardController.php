<?php

namespace App\Http\Controllers\Dashboard;

class DashboardController extends AdminController
{
    public function index()
    {
        return $this->view('dashboard');
    }
}

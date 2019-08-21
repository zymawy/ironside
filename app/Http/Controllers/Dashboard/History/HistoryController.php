<?php

namespace App\Http\Controllers\Dashboard\History;

use App\Http\Controllers\Dashboard\IronsideDashboardController;
use App\Models\LogActivity;
use App\Models\LogDashboardActivity;

class HistoryController extends IronsideDashboardController
{
    public function website()
    {
        $actions = LogActivity::getLatest();

        return $this->view('history.website', compact('actions'));
    }

    public function admin()
    {
        $activities = LogDashboardActivity::getLatest();

        return $this->view('history.dashboard', compact('activities'));
    }
}

<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Dashboard\IronsideDashboardController;
use App\Models\FeedbackContactUs;

class SummaryController extends IronsideDashboardController
{
    public function index()
    {
        $items = $this->getData();

        return $this->view('reports.summary', compact('items'));
    }

    private function getData()
    {
        $result = [];

        $result[] = ['', ''];
        $result[] = ['<strong>Feedback Forms</strong>', ''];
        $result[] = ['Contact Us', FeedbackContactUs::count()];

        $result[] = ['', ''];
        $result[] = ['<strong>Item 2</strong>', ''];
        $result[] = ['Total xx', '0'];

        return $result;
    }
}

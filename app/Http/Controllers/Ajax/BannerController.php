<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Dashboard\IronsideDashboardController;
use App\Http\Controllers\Traits\ReportChartTable;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends IronsideDashboardController
{
    use ReportChartTable;
    public function getChartData()
    {
        // get all items between dates
        $rows = Banner::all();

        // collection group by date
        $days = $rows->groupBy(function ($row) {
            return $row->created_at->format('l d F');
        })->all();

        // format and add to response
        $response = ['labels' => [], 'total' => 0];
        $line = [];
        foreach ($days as $date => $items) {
            $response['total'] += $items->count();
            $response['labels'][] = $date;

            $line[] = $items->count();
        }

        $response['datasets'][] = $this->getDataSet('Total', $line);

        return json_encode($response);
    }
}

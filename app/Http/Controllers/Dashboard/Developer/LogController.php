<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 1/3/19
 * Time: 9:53 PM.
 */

namespace App\Http\Controllers\Dashboard\Developer;

use App\Classes\LogViewer;
use App\Http\Controllers\Dashboard\AdminController;

class LogController extends AdminController
{
    /**
     * Lists all log files.
     *
     * @return LogController
     */
    public function index()
    {
        $this->data['files'] = LogViewer::getFiles(true, false);
        $this->data['title'] = trans('dashboard/log.log_manager');

//        return $this->data;
        return $this->view('logs.logs', $this->data);
    }

    /**
     * Previews a log file.
     *
     * @throws \Exception
     */
    public function preview($file_name)
    {
        LogViewer::setFile(base64_decode($file_name));
        $logs = LogViewer::all();
        if (count($logs) <= 0) {
            abort(404, trans('dashboard/log.log_file_doesnt_exist'));
        }
        $this->data['logs'] = $logs;
        $this->data['title'] = trans('dashboard/log.preview').' '.trans('dashboard/log.logs');
        $this->data['file_name'] = base64_decode($file_name);

        return $this->view('logs.log_item', $this->data);
    }

    /**
     * Downloads a log file.
     *
     * @param $file_name
     *
     * @throws \Exception
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($file_name)
    {
        return response()->download(LogViewer::pathToLogFile(base64_decode($file_name)));
    }

    /**
     * Deletes a log file.
     *
     * @param $file_name
     *
     * @throws \Exception
     *
     * @return string
     */
    public function delete($file_name)
    {
        if (app('files')->delete(LogViewer::pathToLogFile(base64_decode($file_name)))) {
            return 'success';
        }
        abort(404, trans('dashboard/log.log_file_doesnt_exist'));
    }
}

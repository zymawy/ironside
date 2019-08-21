<?php

namespace App\Http\Controllers\Dashboard\Developer;

use App\Http\Controllers\Dashboard\AdminController;
use Artisan;
use Exception;
use League\Flysystem\Adapter\Local;
use Log;
use Request;
use Response;
use Storage;

class BackupController extends AdminController
{
    public function index()
    {
        if (!count(config('backup.backup.destination.disks'))) {
            dd(trans('dashboard/backup.no_disks_configured'));
        }
        $this->data['backups'] = [];
        foreach (config('backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getDriver()->getAdapter();
            $files = $disk->allFiles();
            // make an array of backup files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                    $this->data['backups'][] = [
                        'file_path'     => $f,
                        'file_name'     => str_replace('backups/', '', $f),
                        'file_size'     => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk'          => $disk_name,
                        'download'      => ($adapter instanceof Local) ? true : false,
                    ];
                }
            }
        }
        // reverse the backups, so the newest one would be on top
        $this->data['backups'] = array_reverse($this->data['backups']);
        $this->data['title'] = 'Backups';

        return $this->view('backup.index', $this->data);
    }

    public function create()
    {
        try {
            ini_set('max_execution_time', 600);
            // start the backup process
            $flags = config('backup.backup.backpack_flags', false);
            info('Calling backup:run ', $flags);
            if ($flags) {
                Artisan::call('php artisan backup:run', $flags);
            } else {
                Artisan::call('php artisan backup:run');
            }
            $output = Artisan::output();
            // log the results
            Log::info("Ironside -- New Backup Started From Dashboard Interface \r\n".$output);
            // return the results as a response to the ajax call
            echo $output;
        } catch (Exception $e) {
            Response::make($e->getMessage(), 500);
        }

        return 'success';
    }

    /**
     * Downloads a backup zip file.
     */
    public function download()
    {
        $disk = Storage::disk(Request::input('disk'));
        $file_name = Request::input('file_name');
        $adapter = $disk->getDriver()->getAdapter();
        if ($adapter instanceof Local) {
            $storage_path = $disk->getDriver()->getAdapter()->getPathPrefix();
            if ($disk->exists($file_name)) {
                return response()->download($storage_path.$file_name);
            } else {
                abort(404, trans('backpack::backup.backup_doesnt_exist'));
            }
        } else {
            abort(404, trans('backpack::backup.only_local_downloads_supported'));
        }
    }

    /**
     * Deletes a backup file.
     */
    public function delete($file_name)
    {
        $disk = Storage::disk(Request::input('disk'));
        if ($disk->exists($file_name)) {
            $disk->delete($file_name);

            return 'success';
        } else {
            abort(404, trans('backpack::backup.backup_doesnt_exist'));
        }
    }
}

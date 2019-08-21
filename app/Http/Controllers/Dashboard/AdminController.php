<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Validation\ValidationException;

class AdminController extends IronsideDashboardController
{
    /**
     * Generate a filename and try to move the file.
     *
     * @param $attributes
     *
     * @throws ValidationException
     *
     * @return string
     */
    protected function moveDocument(&$attributes)
    {
        // get and move file
        $file = $attributes['file'];
        $filename = token().'.'.$file->extension();
        $file->move(upload_path('documents'), $filename);
        unset($attributes['file']); // remove from attributes

        if (!\File::exists(upload_path('documents').$filename)) {
            $validator = \Validator::make([], ['file' => 'required'],
                ['file.required' => __('dashboard/general.we_cant_upload')]);

            throw new ValidationException($validator);
        }

        return $filename;
    }
}

<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait CRUDNotify
{
    /**
     * Get Model class name, add space before all capital letters
     *
     * @param $model
     * @return mixed
     */
    private function formatModelName($model)
    {
        return preg_replace('/(?<!\ )[A-Z]/', ' $0', class_basename($model));
    }

    /**
     * Create Entry
     *
     * @param $model
     * @param $inputs
     * @return mixed
     */
    public function createEntry($model, $inputs)
    {
        $row = $model::create($inputs);

        if ($row) {
            notify()->success(__('dashboard/general.successfully'),
                __('dashboard/general.the_msg_create',['model' => $this->formatModelName($model)]));
        }
        else {
            notify()->error(__('dashboard/general.oops'), __('dashboard/general.something_went'));
        }

        return $row;
    }

    /**
     * @param $model
     * @param $inputs
     * @return mixed
     */
    public function updateEntry($model, $inputs)
    {
        $response = $model->update($inputs);

        notify()->success(__('dashboard/general.successfully'),
        __('dashboard/general.the_msg_update',['model' => $this->formatModelName($model)]));

        return $model;
    }

    /**
     * @param         $model
     * @param Request $request
     */
    public function deleteEntry($model, Request $request)
    {
        // check if ids match (cant type random ids)
        if ($request->get('_id') == $model->id) {
            if ($model->delete() >= 1) {
                notify()->success(__('dashboard/general.successfully'),
                    __('dashboard/general.the_msg_remove',['model' => $this->formatModelName($model)]));
            }
            else {
                notify()->error(__('dashboard/general.oops'),
                    __('dashboard/general.the_msg_could_not_find',['model' => $this->formatModelName($model)]));
            }
        }
        else {
            notify()->error(__('dashboard/general.oops'),
                __('dashboard/general.the_msg_not_match',['model' => $this->formatModelName($model)]));
        }
    }
}
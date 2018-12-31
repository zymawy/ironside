<?php

namespace App\Http\Controllers\Dashboard\General;

use App\Http\Controllers\Traits\ReportChartTable;
use Image;
use Redirect;
use App\Http\Requests;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\AdminController;

class BannersController extends AdminController
{

    use ReportChartTable;
    public function getChartData()
    {
        // get all items between dates
        $rows = Banner::where('created_at', '>=', $this->inputDateFrom() . '%')
            ->where('created_at', '<=', $this->inputDateTo() . '  23:59:59')
            ->orderBy('created_at')
            ->get();

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



    /**
     * Get the data - datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTableData()
    {
        $items = Banner::selectRaw('*, DATE_FORMAT(created_at, "%d %b, %Y ") as date')
            ->where('created_at', '>=', $this->inputDateFrom() . '%')
            ->where('created_at', '<=', $this->inputDateTo() . '  23:59:59')
            ->orderBy('created_at')
            ->get();

        return DataTables::of($items)->addColumn('fullname', function ($row) {
            return $row->fullname;
        })->addColumn('date', function ($row) {
            return $row->created_at->format('d M Y');
        })->make(true);
    }

    /**
     * Display a listing of banner.
     *
     * @return Response
     */
    public function index()
    {
        save_resource_url();

        return $this->view('banners.index')->with('items', Banner::all());
    }

    /**
     * Show the form for creating a new banner.
     *
     * @return Response
     */
    public function create()
    {
        return $this->view('banners.create_edit');
    }

    /**
     * Store a newly created banner in storage.
     *
     * @return Response
     */
    public function store()
    {
        $attributes = request()->validate(Banner::$rules, Banner::$messages);

        $attributes['hide_name'] = boolval(input('hide_name'));
        $attributes['is_website'] = boolval(input('is_website'));

        $photo = $this->uploadBanner($attributes['photo']);
        if ($photo) {
            $attributes['image'] = $photo;
            unset($attributes['photo']);
            $banner = $this->createEntry(Banner::class, $attributes);
        }

        return redirect_to_resource();
    }

    /**
     * Display the specified banner.
     *
     * @param Banner $banner
     * @return Response
     */
    public function show(Banner $banner)
    {
        return $this->view('banners.show')->with('item', $banner);
    }

    /**
     * Show the form for editing the specified banner.
     *
     * @param Banner $banner
     * @return Response
     */
    public function edit(Banner $banner)
    {
        return $this->view('banners.create_edit')->with('item', $banner);
    }

    /**
     * Update the specified banner in storage.
     *
     * @param Banner  $banner
     * @param Request $request
     * @return Response
     */
    public function update(Banner $banner, Request $request)
    {
        if (is_null($request->file('photo'))) {
            $attributes = request()->validate(array_except(Banner::$rules, 'photo'),
                Banner::$messages);
        }
        else {
            $attributes = request()->validate(Banner::$rules, Banner::$messages);

            $photo = $this->uploadBanner($attributes['photo']);
            if ($photo) {
                $attributes['image'] = $photo;
            }
        }

        unset($attributes['photo']);
        $attributes['hide_name'] = boolval(input('hide_name'));
        $attributes['is_website'] = boolval(input('is_website'));

        $this->updateEntry($banner, $attributes);

        return redirect_to_resource();
    }

    /**
     * Remove the specified banner from storage.
     *
     * @param Banner  $banner
     * @param Request $request
     * @return Response
     */
    public function destroy(Banner $banner, Request $request)
    {
        // update list order
        $banner->update(['list_order' => 999]);

        $this->deleteEntry($banner, $request);

        return redirect_to_resource();
    }

    /**
     * Upload the banner image, create a thumb as well
     *
     * @param        $file
     * @param string $path
     * @param array  $size
     * @return string|void
     */
    public function uploadBanner(
        $file,
        $path = '',
        $size = ['o' => [1920, 500], 'tn' => [576, 150]]
    ) {
        $name = token();
        $extension = $file->guessClientExtension();

        $filename = $name . '.' . $extension;
        $filenameThumb = $name . '-tn.' . $extension;
        $imageTmp = Image::make($file->getRealPath());

        if (!$imageTmp) {
            return notify()->error('Oops', 'Something went wrong', 'warning shake animated');
        }

        $path = upload_path_images($path);

        // original
        $imageTmp->save($path . $name . '-o.' . $extension);

        // save the image
        $image = $imageTmp->fit($size['o'][0], $size['o'][1])->save($path . $filename);

        $image->fit($size['tn'][0], $size['tn'][1])->save($path . $filenameThumb);

        return $filename;
    }
}

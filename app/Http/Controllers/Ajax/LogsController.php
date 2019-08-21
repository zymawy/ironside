<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Zymawy\Ironside\Models\LogSocialShare;
use Zymawy\Ironside\Models\Page;

class LogsController extends AjaxController
{
    /**
     * Logs the social media clicks.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function socialMedia(Request $request)
    {
        //$row = LogSocialShare::create([
        //    'type'         => input('type'),
        //    'title'        => input('title'),
        //    'description'  => input('description'),
        //    'url'          => input('url'),
        //    'image'        => input('image'),
        //    'client_ip'    => $this->clientIp,
        //    'client_agent' => $this->clientAgent,
        //]);

        $url = substr(input('url'), strlen(config('app.url')));

        $page = Page::where('url', $url)->first();
        if ($page) {
            $page->increment('social_shares');
            //$page->increment('facebook_shares');
        }

        return json_response();
    }
}

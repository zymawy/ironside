<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

if (!function_exists('user')) {
    /**
     * Get the logged in user
     *
     * @param string $guard
     * @return \App\Models\User|null
     */
    function user($guard = 'web')
    {
        return ((Auth::guard($guard)->user()) ? Auth::guard($guard)->user() : (object) ['id' => 0]);
    }
}

if (!function_exists('url_admin')) {
    /**
     * Generate a url for the application.
     *
     * @param  string $path
     * @param  mixed  $parameters
     * @param  bool   $secure
     * @return string
     */
    function url_admin($path = null, $parameters = [], $secure = null)
    {
        return app('url')->to('dashboard/' . $path, $parameters, $secure);
    }
}

if (!function_exists('route_admin')) {
    /**
     * Generate a URL to a named route.
     *
     * @param  string                    $name
     * @param  array                     $parameters
     * @param  bool                      $absolute
     * @param  \Illuminate\Routing\Route $route
     * @return string
     */
    function route_admin($name, $parameters = [], $absolute = true, $route = null)
    {
        return Redirect::to(app('url')->route('dashboard.' . $name, $parameters, $absolute, $route));
    }
}

if (!function_exists('save_resource_url')) {
    /**
     * Save the resource home url (to easily redirect back on store / update / delete)
     * @param null $url
     */
    function save_resource_url($url = null)
    {
        $url = $url ?: request()->url();

        session()->put('url.resource.home', $url);
    }
}

if (!function_exists('redirect_to_resource')) {

    /**
     * Generate a URL to a named route.
     *
     * @param boolean $to
     * @param int     $status
     * @param array   $headers
     * @param null    $secure
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function redirect_to_resource($to = null, $status = 302, $headers = [], $secure = null)
    {
        $to = $to ?: session('url.resource.home', '/');

        return redirect($to, $status, $headers, $secure);
    }
}

if (!function_exists('input')) {
    /**
     * @param string $key
     * @param null   $default
     * @return mixed|null
     */
    function input($key = '', $default = null)
    {
        return (Input::has($key) ? Input::get($key) : $default);
    }
}

if (!function_exists('token')) {
    /**
     * Generates a random token
     *
     * @param  String $str [description]
     *
     * @return String      [description]
     */
    function token($str = null)
    {
        $str = isset($str) ? $str : Str::random();
        $value = str_shuffle(sha1($str . microtime(true)));
        $token = hash_hmac('sha1', $value, env('APP_KEY'));

        return $token;
    }
}

/**
 * Convert a csv to an array
 *
 * @param string $filename
 * @param string $delimiter
 * @return array|bool
 */
function csv_to_array($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    }

    $header = null;
    $data = [];
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
            if (!$header) {
                $header = $row;
            }
            else {
                if (count($header) == count($row)) {
                    $data[] = array_combine($header, $row);
                }
            }
        }
        fclose($handle);
    }

    return $data;
}

/**
 * Search for a given value in $haystack
 * Can overide the default key to search on
 *
 * @param        $value
 * @param        $haystack
 * @param string $k
 * @return bool
 */
function array_search_value($value, $haystack, $k = 'id')
{
    foreach ($haystack as $key => $item) {
        if ($value == $item[$k]) {
            return true;
        }
    }

    return false;
}

/**
 * A Success json response
 * @param $response
 * @return \Illuminate\Http\JsonResponse
 */
function json_response($response = 'success')
{
    $data = [
        'success' => 1,
        'error'   => null,
        'data'    => $response,
    ];

    return response()->json($data);
}

/**
 * An Error json response
 * @param        $title
 * @param string $content
 * @param string $type
 * @return \Illuminate\Http\JsonResponse
 */
function json_response_error($title, $content = '', $type = 'popup')
{
    return response()->json([
        'success' => 0,
        'type'    => $type,
        'error'   => ['title' => $title, 'content' => $content]
    ]);
}

/**
 * An Error json response
 * @param $title
 * @param $content
 * @return \Illuminate\Http\JsonResponse
 */
function json_response_error_alert($title, $content = '')
{
    return json_response($title, $content, 'alert');
}

/**
 * Check if the slug is actually a valid url
 *
 * @param $slug
 * @return bool
 */
function is_slug_url($slug)
{
    if (strpos($slug, 'http://') === 0) {
        return true;
    }

    if (strpos($slug, 'https://') === 0) {
        return true;
    }

    if (strpos($slug, 'www.') === 0) {
        return true;
    }

    return false;
}

if (!function_exists('mail_to_admins')) {
    function mail_to_admins($message)
    {
        $list = explode(',', env('MAIL_ADMIN_EMAILS'));
        foreach ($list as $k => $email) {
            if (strlen($email) > 2) {
                $message->to($email, env('MAIL_ADMIN_NAME'));
            }
        }

        return $message;
    }
}
if (!function_exists('log_activity')) {
    /**
     * Log Activity
     * @param string $title
     * @param string $description
     * @param null   $eloquent
     */
    function log_activity($title = '', $description = '', $eloquent = null)
    {
        event(new App\Events\ActivityWasTriggered($title, $description, $eloquent));
    }
}

if (!function_exists('slugifyMe')) {

    function slugifyMe($title = null, $separator = "-")
    {
        $title = trim($title);
        $title = mb_strtolower($title, 'UTF-8');

        $title = str_replace('‌', $separator, $title);

        $title = preg_replace(
            '/[^a-z0-9_\s\-اآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوةيإأۀءهی۰۱۲۳۴۵۶۷۸۹٠١٢٣٤٥٦٧٨٩]/u',
            '',
            $title
        );

        $title = preg_replace('/[\s\-_]+/', ' ', $title);
        $title = preg_replace('/[\s_]/', $separator, $title);
        $title = trim($title, $separator);

        return $title;
    }
}


if (!function_exists('notify')) {
    /**
     * Helper notify info() without facade: Notify::info()
     *
     * @param null        $title
     * @param null        $content
     * @param bool|string $icon
     * @return \Illuminate\Foundation\Application|mixed
     */
    function notify($title = null, $content = null, $icon = true)
    {
        $notifier = app('notify');
        if (!is_null($title)) {
            return $notifier->info($title, $content, $icon);
        }
        return $notifier;
    }
}
if (!function_exists('notify_icon')) {
    /**
     * Get the icon for the notify level
     *
     * @param $level
     * @return string
     */
    function notify_icon($level)
    {
        switch ($level) {
            case 'danger':
                return 'times shake';
                break;
            case 'warning':
                return 'warning shake';
                break;
            case 'success':
                return 'smile-o bounce';
                break;
            default: // info / default
                return 'bell shake';
                break;
        }
    }
}
if (!function_exists('notify_icon_small')) {
    /**
     * Get the icon for the notify level
     *
     * @param $level
     * @return string
     */
    function notify_icon_small($level)
    {
        switch ($level) {
            case 'danger':
                return 'times spin';
                break;
            case 'warning':
                return 'times-circle-o spin';
                break;
            case 'success':
                return 'smile-o bounce';
                break;
            default: // info / default
                return 'bell spin';
                break;
        }
    }
}

if (!function_exists('alert')) {
    /**
     * Helper alert()->info() without facade: Alert::info()
     *
     * @param null        $title
     * @param null        $content
     * @param bool|string $icon
     * @return \Illuminate\Foundation\Application|mixed
     */
    function alert($title = null, $content = null, $icon = true)
    {
        $notifier = app('alert');
        if (!is_null($title)) {
            return $notifier->info($title, $content, $icon);
        }
        return $notifier;
    }
}
if (!function_exists('alert_icon')) {
    /**
     * Get the icon for the notify level
     *
     * @param $level
     * @return string
     */
    function alert_icon($level)
    {
        switch ($level) {
            case 'danger':
                return 'times';
                break;
            case 'warning':
                return 'warning';
                break;
            case 'success':
                return 'check';
                break;
            default: // info / default
                return 'info';
                break;
        }
    }
}

if (!function_exists('impersonate')) {
    /**
     * Helper impersonate() without facade: Impersonate::login()
     *
     * @param User|null $user
     * @return \Illuminate\Foundation\Application|mixed
     */
    function impersonate(User $user = null)
    {
        $impersonate = app('impersonate');
        if (!is_null($user)) {
            return $impersonate->login($user);
        }
        return $impersonate;
    }
}

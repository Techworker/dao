<?php

namespace App\Http\Actions;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AbstractAction extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Gets the name of the route.
     *
     * @return mixed
     */
    public static function routeName() : string
    {
        return str_replace('app_http_actions_', '', snake_case(str_replace('\\', '', static::class)));
    }

    /**
     * Gets a compiled route for the action with the given params.
     *
     * @param array $params
     * @return string
     */
    public static function route(array $params = [])
    {
        return route(static::routeName(), $params);
    }

    /**
     * Gets a compiled route for the action with the given params.
     *
     * @param array $params
     * @return string
     */
    public static function isActiveRoute()
    {
        return \Route::currentRouteName() === static::routeName();
    }
}

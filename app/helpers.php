<?php

/**
 * Returns a route endpoint together with the automatically created name.
 *
 * @param string $class
 * @return array
 */
function pascRoute(string $class, bool $exposed = true)
{
    return [
        'exposed' => $exposed,
        'uses' => $class,
        'as' => call_user_func([$class, 'routeName'])
    ];
}
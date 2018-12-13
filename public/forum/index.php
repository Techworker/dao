<?php

/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require '../../forum/vendor/autoload.php';

$server = new Flarum\Http\Server(
    Flarum\Foundation\Site::fromPaths([
        'base' => __DIR__ . '/../../forum',
        'public' => __DIR__,
        'storage' => __DIR__.'/../../forum/storage',
    ])
);

$server->listen();
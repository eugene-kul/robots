<?php

use Eugene3993\Robots\Classes\Robots;
use Eugene3993\Robots\Models\Settings;
use Cms\Classes\Controller;

Route::get('robots.txt', function() {
    $robot = new Robots;
    if (!Settings::get('enable_robots_txt')) {
        return  \App::make(Controller::class)->setStatusCode(404)->run('404');
    } else {
        return \Response::make($robot->generate())->header("Content-Type", "text/plain");
    }
});
<?php

\Event::listen('backend.page.beforeDisplay', function($controller, $action, $params) {
    $controller->addJs('/plugins/eugene3993/robots/assets/meta_count.js');
});
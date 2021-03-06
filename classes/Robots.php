<?php namespace Eugene3993\Robots\Classes;

use Eugene3993\Robots\Models\Settings;

class Robots {
    public static function generate() {
        $domain = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
        $content = str_replace('$domain', $domain, Settings::get('robots_txt'));
        return $content;
    }
}

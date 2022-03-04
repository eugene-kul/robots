<?php namespace Eugene3993\Robots\Models;

use Model;

class Settings extends Model {

    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'eugene_robots_settings';
    public $settingsFields = 'fields.yaml';
    protected $cache = [];

}
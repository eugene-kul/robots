<?php namespace Eugene3993\Robots;

use System\Classes\PluginBase;
use System\Classes\SettingsManager;
use System\Classes\PluginManager;
use Cms\Classes\Theme;
use Lang;

class Plugin extends PluginBase {

    public function registerComponents() {
        return [
            'Eugene3993\Robots\Components\Meta' => 'metaRobots',
        ];
    }

    public function registerSettings() {
        return [
            'settings' => [
                'label'       => 'Robots.txt',
                'description' => 'eugene3993.robots::lang.config.description',
                'icon'        => 'icon-gears',
                'category'    => SettingsManager::CATEGORY_CMS,
                'class'       => 'Eugene3993\Robots\Models\Settings',
                'order'       => 100,
                'permissions' => [ 'eugene3993.robots' ],
            ]
        ];
    }

    public function register() {
        \Event::listen('backend.form.extendFields', function($widget) {

            if ($widget->isNested === false ) {

                if (!($theme = Theme::getEditTheme()))
                    throw new ApplicationException(Lang::get('cms::lang.theme.edit.not_found'));

                if (PluginManager::instance()->hasPlugin('RainLab.Pages') && $widget->model instanceof \RainLab\Pages\Classes\Page) {
                    $widget->addFields($this->staticSeoFields(), 'primary');
                }

                if (PluginManager::instance()->hasPlugin('RainLab.Blog') && $widget->model instanceof \RainLab\Blog\Models\Post) {
                    $widget->addFields($this->blogSeoFields(), 'secondary');
                }

                if (!$widget->model instanceof \Cms\Classes\Page) return;

                $widget->addFields($this->cmsSeoFields(), 'primary');
            }

        });
    }

    private function blogSeoFields() {
        return collect($this->seoFields())->mapWithKeys(function($item, $key) {
            return ["metadata[$key]" => $item];
        })->toArray();
    }

    private function staticSeoFields() {
        return collect($this->seoFields())->mapWithKeys(function($item, $key) {
            return ["viewBag[$key]" => $item];
        })->toArray();
    }
    private function cmsSeoFields() {
        return collect($this->seofields())->mapWithKeys(function($item, $key) {
            return ["settings[$key]" => $item];
        })->toArray();
    }

    private function seoFields() {
        $user = \BackendAuth::getUser();
        return array_except(
            \Yaml::parseFile(plugins_path('eugene3993/robots/config/seofields.yaml')),
            array_merge(
                [],
                !$user->hasPermission(["eugene3993.robots"]) ? [
                    "robot_index",
                    "robot_follow",
                ] : [],
            )
        );
    }
}

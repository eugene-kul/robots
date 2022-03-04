<?php namespace Eugene3993\Robots\Components;

use Cms\Classes\ComponentBase;

use Request;
use Eugene3993\Robots\Models\Settings;
use Cms\Classes\Page;
use Cms\Components\ViewBag;

class Meta extends ComponentBase {

    public $settings;

    public function onRender() {
        $this->settings = Settings::instance();
        $thisPage = $this->page->page;

        if (!$this->page['viewBag']) $this->page['viewBag'] = new ViewBag;

        if (isset($this->page->apiBag['staticPage'])) { // static page
            $this->page['viewBag'] = $this->page->controller->vars['page']->viewBag;

        } else { // cms page
            $this->page['viewBag']->setProperties(array_merge($this->page['viewBag']->getProperties(), $this->page->settings));
        }

    }

    public function componentDetails() {
        return [
            'name' => 'Meta Robots',
            'description' => 'eugene3993.robots::lang.component.description',
            'icon'        => 'icon-gears',
        ];
    }
}

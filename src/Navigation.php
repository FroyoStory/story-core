<?php

namespace Story\Core;

use App\Providers\AppServiceProvider;

class Navigation
{
    /**
     * The navigation property
     *
     * @var array
     */
    protected $navigations = [];

    /**
     * Get all navigation from all service providers
     *
     * @return array
     */
    public function get($context)
    {
        foreach (AppServiceProvider::$modules as $module) {
            if (method_exists($module, 'navigation')) {
                $this->navigations = array_merge_recursive_ex($this->navigations, $module::navigation());
            }
        }

        if (array_key_exists($context, $this->navigations)) {
            return $this->navigations[$context];
        }

        return [];
    }
}

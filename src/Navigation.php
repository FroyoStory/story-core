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
    public function get()
    {
        foreach (AppServiceProvider::$modules as $module) {
            $this->navigations = array_merge_recursive($this->navigations, $module::navigation());
        }

        return $this->navigations;
    }
}

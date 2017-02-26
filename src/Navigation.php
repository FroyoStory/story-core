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
            $this->navigations = $this->array_merge_recursive_ex($this->navigations, $module::navigation());
        }

        if (array_key_exists($context, $this->navigations)) {
            return $this->navigations[$context];
        }

        return [];
    }

    /**
     * Helper to merge navigation
     *
     * @param  array $array1
     * @param  array $array2
     * @return array
     */
    protected function array_merge_recursive_ex(array $array1, array $array2)
    {
        $merged = $array1;

        foreach ($array2 as $key => & $value) {
            if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
                $merged[$key] = $this->array_merge_recursive_ex($merged[$key], $value);
            } else if (is_numeric($key)) {
                if (!in_array($value, $merged)) {
                    $merged[] = $value;
                }
            } else {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }
}

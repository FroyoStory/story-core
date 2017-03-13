<?php

namespace Story\Core;

use App\Providers\AppServiceProvider;

class Hook
{
    protected $hooks = [];

    public function get($context, $data = [])
    {
        foreach (AppServiceProvider::$modules as $module) {
            if (method_exists($module, 'hook')) {
                $this->hooks = array_merge_recursive_ex($this->hooks, $module::hook($data));
            }
        }

        if (array_key_exists($context, $this->hooks)) {
            return $this->hooks[$context];
        }

        return [];
    }
}

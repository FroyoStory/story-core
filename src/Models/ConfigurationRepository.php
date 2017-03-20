<?php

namespace Story\Core\Models;

use Auth;

class ConfigurationRepository
{
    public static function set($name, $value)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            return Configuration::updateOrCreate(compact('name'), compact('value', 'user_id'));
        }

        return false;
    }

    public static function get($name)
    {
        $data = Configuration::where('name', $name)->first();
        return $data ? $data->value : false;
    }
}

<?php

namespace Story\Core\Models;

use Story\Core\Model;

class Configuration extends Model
{
    protected $table = 'configurations';
    protected $fillable = ['name', 'value', 'user_id'];
}

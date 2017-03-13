<?php

namespace Story\Core\Tabs;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class Tab
{
    protected $name;

    protected $view;

    protected $data;

    public function __construct($name, $view, Array $data = [])
    {
        $this->name = $name;
        $this->view = $view;
        $this->data = $data;
    }

    public function display()
    {
        return (object) [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'content' => View::make($this->view, $this->data)->render()
        ];
    }
}

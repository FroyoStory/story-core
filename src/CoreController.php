<?php

namespace Story\Core;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The module name
     *
     * @var string
     */
    protected $module;

    /**
     * The global variable data controller
     *
     * @var array
     */
    protected $data = [];

    /**
     * Render view from given request
     *
     * @param  string     $template
     * @param  Array|array $data
     * @return \Illuminate\Http\Response
     */
    public function view($template, Array $data = [])
    {
        $data = array_merge($this->data, $data);

        return view($this->module . '.' . $template, $data);
    }
}

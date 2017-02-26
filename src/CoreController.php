<?php

namespace Story\Core;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $module;

    /**
     * Render view from given request
     *
     * @param  string     $template
     * @param  Array|array $data
     * @return \Illuminate\Http\Response
     */
    public function view($template, Array $data = [])
    {
        return view($this->module . '.' . $template, $data);
    }
}

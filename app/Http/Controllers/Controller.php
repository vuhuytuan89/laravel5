<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {

        $this->data['title'] = "Admin controll panel";
        $routeFull = Route::getCurrentRoute()->getActionName();
        list($controller, $actionName) = explode('@', $routeFull);
        $controller = preg_replace('/.*\\\/', '', $controller);
        $this->data['controllerName'] = $controller;
        $this->data['actionName'] = $actionName;

    }
}

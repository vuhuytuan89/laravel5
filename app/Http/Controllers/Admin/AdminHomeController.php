<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        $this->data['title'] = "Administrator";
        return view('admin.home', $this->data);
    }
}

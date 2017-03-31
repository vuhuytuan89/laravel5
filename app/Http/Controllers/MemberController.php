<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
class MemberController extends Controller
{
    //
    public function getLogin() {
        return view('login.index');
    }

    public function postLogin(MemberRequest $request) {
        echo "<pre>";var_dump($request);
    }
}

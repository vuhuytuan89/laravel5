<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use App\User;
class AdminLoginController extends Controller
{
    protected $redirectTo = '/home';
    public function getLogin()
    {
        if (Auth::check()) {
            //return redirect()->route('adminIndex');
            return redirect('admincp');
        } else {
            return view('admin.login');
        }

    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'level' => 1
        ];
        if (Auth::attempt($login)) {
            //return redirect()->route('adminIndex');
            return redirect('admincp');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    /**
     * action admincp/logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

}

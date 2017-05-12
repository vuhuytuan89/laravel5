<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminUserController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = 'User List';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $listUser = User::all();
        //$listUser = User::orderBy('id', 'desc')->get();
        $listUser = DB::table('users')
            ->orderBy('id', 'desc')
            ->paginate(10);//phan trang
        $this->data['listUser'] = $listUser;
        return view('admin.user.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = 'Create New User';
        return view('admin.user.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // valid form
        $rule = [
            'txtName' => 'required',
            'txtEmail' => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3'
        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails())
        {
            return Redirect::to('admincp/user/create')
                ->withErrors($validator)
                //->withInput();
                ->withInput(Input::except('password')); // ngoại trừ password
        } else {
            $user = new User;
            $user->name = Input::get('txtName');
            $user->email = Input::get('txtEmail');
            //$user->password = bcrypt(Input::get('password'));
            $user->password = Hash::make(Input::get('password'));
            $user->level = Input::get('level');
            $user->status = Input::get('status');
            $user->save();

            Session::flash('message', "Successfully created user");
            return Redirect::to('admincp/user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $this->data['title'] = 'Edit user';
        $this->data['user'] = $user;
        return view('admin.user.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo 'update';
        $rule = [
            'txtName' => 'required',
            'txtEmail' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3'
        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails())
        {
            return Redirect::to('admincp/user/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = User::find($id);
            $user->name = Input::get('txtName');
            $user->email = Input::get('txtEmail');
            $user->password = Hash::make(Input::get('password'));
            $user->level = Input::get('level');
            $user->status = Input::get('status');
            $user->save();

            Session::flash('message', "Successfully edit user");
            return Redirect::to('admincp/user');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('message', "Successfully delete user");
        return Redirect::to('admincp/user');
    }
}

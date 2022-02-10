<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function view($id){
        $users = User::find($id);
        return view('admin.user.view',compact('users'));
    }
    static function userCount()
    {
        return User::all()->count();
    }
}

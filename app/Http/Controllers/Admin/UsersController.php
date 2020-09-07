<?php
//
//namespace App\Http\Admin\Controllers;
//
//use App\Http\Controllers\Controller;
//use App\User;
//use Illuminate\Http\Request;
//
//class UsersController extends Controller {
//    public function index() {
//        $users = (new User())->get();
//
//        $params = [
//            'users' => $users
//        ];
//
//        return view('admin.users.index', $params);
//    }
//
//}


namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index() {
        $users = (new User())->get();

        $params = [
            'users' => $users
        ];

        return view('users.index', $params);
    }
}

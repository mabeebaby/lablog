<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Model\Article;
use App\Model\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller {
//    public function index() {
//        return view('account.index');
//    }


    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        return view('account.index', ['user' => $user, 'comments' => $user->comments]);
    }

    public function acceptComment($id)
    {
        \DB::table('comment')->where('id', $id)->update(['status' => true]);
        return back();
    }


    public function deleteComments(Request $request)
    {
        if($request->ajax()) {
            $id = (int)$request->input('id');
            $Comments = new Comment();

            $Comments->where('id', $id)->delete();
        }
    }
}

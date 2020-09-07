<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Comment;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class CommentsController extends Controller {
    public function index()
    {
        $comments = (new Comment())->get();
        $params = [
            'comments' => $comments
        ];
        return view('Admin.comments', $params);
    }

    public function acceptComment($id)
    {
        \DB::table('comment')->where('id', $id)->update(['status' => true]);
        return back();
    }

    public function deleteComment(Request $request)
    {
        if($request->ajax()) {
            $id = (int)$request->input('id');
            $Comments = new Comment();

            $Comments->where('id', $id)->delete();
        }
    }
}

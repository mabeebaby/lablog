<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function index() {
        $objArticle = new Article();
        $articles = $objArticle->orderBy('id', 'desc')->paginate(10);

        return view('index', ['articles' => $articles]);
    }

    public function showArticle(int $id, $slug) {
        {
            $objArticle = Article::find($id);
            if(!$objArticle) {
                return abort(404);
            }else
                $comments = $objArticle->comments()->where('status', 1)->get();
                return view('post', ['article' => $objArticle, 'comments' => $comments] );
        }
    }
}

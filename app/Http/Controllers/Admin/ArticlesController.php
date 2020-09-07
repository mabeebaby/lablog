<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Request\ArticleRequest;
use App\Model\Article;
use App\Model\Category;
use App\Model\CategoryArticle;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class ArticlesController extends Controller {
    public function main() {
        $objArticle = new Article();
        $articles = $objArticle->get();

        return view("Admin.Articles.main", ["articles" => $articles]);
    }

    public function addArticle() {
        $objCategory = new Category();
        $categories = $objCategory->get();

        return view("Admin.Articles.add", ["categories" => $categories]);
    }

    public function addArticleRequest(ArticleRequest $request) {
        $objArticle = new Article();
        $objCategoryArticle = new CategoryArticle();

        $objArticle = $objArticle->create([
           "title" => $request->input("title"),
           "short_text" => $request->input("short_text"),
           "full_text" => $request->input("full_text"),
           "author" => $request->input("author")
        ]);

        if ($objArticle) {
            return redirect()->route("adminArticles");
        }
        return "Ошибка";
    }

    public function editArticle(int $id) {
        $objCategory = new Category();
        $categories = $objCategory->get();
        $objArticle = Article::find($id);
        if (!$objArticle) {
            return "Статья не найдена";
        }

        return view("Admin.Articles.edit", ["categories" => $categories, "article" => $objArticle]);
    }

    public function editArticleRequest(int $id, ArticleRequest $request)
    {
        $objArticle = Article::find($id);
        if (!$objArticle) {
            return "Статья не найдена";
        }

        $objArticle->title = $request->input("title");
        $objArticle->short_text = $request->input("short_text");
        $objArticle->full_text = $request->input("full_text");
        $objArticle->author = $request->input("author");

        if ($objArticle->save()) {
            //Обновление категории
            return redirect()->route("adminArticles");
        }else {
            return "Не удалось изменить статью";
        }

    }

    public function deleteArticle(Request $request) {
        if($request->ajax()) {
            $id = (int)$request->input('id');
            $objArticle = new Article();

            $objArticle->where('id', $id)->delete();
        }
    }
}

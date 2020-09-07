<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Register || Auth
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'guest'], function (){
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

//Account
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function(){
        var_dump('fddddddddg');
        \Auth::logout();
        return redirect(route('login'));
    })->name('logout');

    Route::get('/account', 'AccountController@index')->name('account')->middleware('verified');
    Route::delete('/account/delete', 'AccountController@deleteComment')->name('deleteComment');

//Admin
    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
        Route::get('/', 'Admin\CategoriesController@main')->name('adminHome');

//Admin/Categories
        Route::get('/categories', 'Admin\CategoriesController@Categories')->name('adminCategories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategories')->name('adminAddCategories');
        Route::post('/categories/add', 'Admin\CategoriesController@addCategoriesRequest');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategories')->where('id', '\d+')->name('adminEditCategories');
        Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editCategoriesRequest')->where('id', '\d+');
        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategories')->name('adminDeleteCategories');

//Admin/Articles
        Route::get('/articles', 'Admin\ArticlesController@main')->name('adminArticles');
        Route::get('/articles/add', 'Admin\ArticlesController@addArticle')->name('adminArticlesAdd');
        Route::post('/articles/add', 'Admin\ArticlesController@addArticleRequest');
        Route::get('/articles/edit/{id}', 'Admin\ArticlesController@editArticle')->where('id', '\d+')->name('adminArticlesEdit');
        Route::post('/articles/edit/{id}', 'Admin\ArticlesController@editArticleRequest')->where('id', '\d+');
        Route::delete('/articles/delete', 'Admin\ArticlesController@deleteArticle')->name('adminArticlesDelete');

//Admin/Users
        Route::get('/users', 'Admin\UsersController@index')->name('adminUsers');

//Admin/Comments
        Route::get('/comments', 'Admin\CommentsController@index')->name('comments');
        Route::post('/comments/add', 'CommentsController@addComments')->name('addComments');
        Route::get('/comments/accepted/{id}', 'Admin\CommentsController@acceptComment')->where('id', '\d+')->name('acceptComments');
        Route::delete('/comments/delete', 'Admin\CommentsController@deleteComment')->name('deleteComment');
    });
});

//Post
Route::get('/', 'MainController@index')->name('index');
Route::get('/post/{id}/{slug}', 'MainController@showArticle')->where('id', '\d')->name('showArticle');


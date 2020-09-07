<?php

use App\User;

if(!function_exists('_user')){
    function _user($user_id)
    {
        $objUser = User::find($user_id);
        if(!$objUser) {
            return 404;
        }

        return $objUser;
    }
}

if(!function_exists('_article')) {
    function _article($article_id)
    {
        $objArticle = \App\Model\Article::find($article_id);
        if(!$objArticle) {
            return 404;
        }

        return $objArticle;
    }
}

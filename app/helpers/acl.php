<?php

function can_manage_article($article, $user = null)
{
    // try to obtain current user
    if (!$user && \Auth::check()) $user = \Auth::user();

    // if user found and this user is the article author, return TRUE
    return ($user && ($user->id == $article->user->id));
}
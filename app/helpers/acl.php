<?php

function _can_manage_content_entity($entity, $managingUser = null)
{
    // try to obtain current user
    if (!$managingUser && \Auth::check()) $managingUser = \Auth::user();

    // if user found and this user is the entity author, return TRUE
    return ($managingUser && (($managingUser->id == $entity->user->id) || $managingUser->is_admin));
}

function can_manage_article($article, $managingUser = null)
{
   return _can_manage_content_entity($article, $managingUser);
}

function can_manage_comment($comment, $managingUser = null)
{
   return _can_manage_content_entity($comment, $managingUser);
}

/*----------*/

function can_manage_user($managedUser, $managingUser = null)
{
    // try to obtain current user
    if (!$managingUser && \Auth::check()) $managingUser = \Auth::user();

    // if user found and this user is the entity author, return TRUE
    return ($managingUser && (($managingUser->id == $managedUser->id) || $managingUser->is_admin));
}

function can_see_user_recently_viewed_articles($viewedUser, $viewer = null)
{
    // try to obtain current user
    if (!$viewer && \Auth::check()) $viewer = \Auth::user();

    // if user found and this user is the entity author, return TRUE
    return ($viewer && (($viewer->id == $viewedUser->id) || $viewer->is_admin));
}
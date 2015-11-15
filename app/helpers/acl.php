<?php

function _can_manage_content_entity($entity, $user = null)
{
    // try to obtain current user
    if (!$user && \Auth::check()) $user = \Auth::user();

    // if user found and this user is the entity author, return TRUE
    return ($user && ($user->id == $entity->user->id));
}

function can_manage_article($article, $user = null)
{
   return _can_manage_content_entity($article, $user);
}

function can_manage_comment($comment, $user = null)
{
   return _can_manage_content_entity($comment, $user);
}
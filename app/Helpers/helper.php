<?php

use App\Models\User;

if(!function_exists('adminUrl'))
{
    function adminUrl(string $url = null)
    {
        $path = '/admin-dashboard/';

        return url($path.$url);
    }
}


if (!function_exists('currentUserType'))
{
    function currentUserType()
    {
        return auth()->check() ? auth()->user()->type : null;
    }
}

if (!function_exists('currentUser'))
{
    function currentUser($user_id = "")
    {
        if ($user_id)
        {
            return User::find($user_id);
        }
        elseif(!$user_id)
        {
            return auth()->user();
        }
        else
        {
            return null;
        }
    }
}

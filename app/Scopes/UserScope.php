<?php

namespace App\Scopes;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class UserScope implements Scope
{


    public function apply(Builder $builder, Model $model)
    {
        $user = currentUser(auth()->user()->id);
        if($user->type == UserType::$MANAGER)
        {
            $builder->where('manager_id',$user->id);
        }
    }

}

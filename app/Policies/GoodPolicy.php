<?php

namespace App\Policies;

use App\Enum\RoleEnum;
use App\Models\Good;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GoodPolicy
{
    public function edit(User $user): bool{
        if(!$user) return false;
        $search = RoleEnum::Admin;
        foreach($user->roles as $role){
            if($role->name == $search->value) return true;
        }
        return false;
    }
}

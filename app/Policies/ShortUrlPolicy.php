<?php

namespace App\Policies;

use App\Models\ShortUrl;
use App\Models\User;

class ShortUrlPolicy
{
    
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return ! $user->hasRole('superadmin');
    }
    


    public function viewAll(User $user):bool{

    return $user->hasAnyRole([
    
    'superadmin',
    'sales',
    'manager'

    ]);

    }


     public function viewCompany(User $user): bool
    {
        return $user->hasRole('admin');
    }


    public function viewOwn(User $user) : bool {
      
    return $user->hasRole('member');

    }


}
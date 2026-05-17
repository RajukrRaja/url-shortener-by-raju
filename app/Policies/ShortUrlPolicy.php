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
        return ! $user->hasRole('SuperAdmin');
    }
    


    public function viewAll(User $user):bool{

    return $user->hasAnyRole([
    
    'SuperAdmin',
    'Sales',
    'Manager'

    ]);

    }


     public function viewCompany(User $user): bool
    {
        return $user->hasRole('Admin');
    }


    public function viewOwn(User $user) : bool {
      
    return $user->hasRole('Member');

    }


}
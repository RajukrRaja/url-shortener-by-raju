<?php

namespace App\Policies;
use App\Models\ShortUrl;
use App\Models\User;


class shortUrlPolicy{



public function viewAny(User $user):bool
{
 return true;
}

public function create()

{
    return ! $user->hasRole('SuperAdmin');
}

}


?>

<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function viewOwner(User $user){
        return $user->roles_id === 1;
    }

    public function viewStaff(User $user){
        return $user->roles_id === 2;
    }

    public function viewCustomer(User $user){
        return $user->roles_id === 3;
    }

    public function viewMember(User $user){
        return $user->roles_id === 4;
    }
}

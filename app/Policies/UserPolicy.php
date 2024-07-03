<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

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

    public function viewOwnerOrStaff(User $user)
    {
        return in_array($user->roles_id, [1, 2]);
    }

    public function viewCustomer(User $user){
        return $user->roles_id === 3;
    }

    public function viewMember(User $user){
        return $user->roles_id === 4;
    }

    public function viewCustorMember(User $user){
        return in_array($user->roles_id, [3, 4]);
    }

    public function getUsers(User $user){
        return ($user->roles_id==1?Response::allow():Response::deny('You must be an administrator'));
    }

    public function getMembers(User $user){
        return (($user->roles_id==1||$user->roles_id==2)?Response::allow():Response::deny('You must be an administrator'));
    }

    public function delete(User $user){
        return ($user->roles_id==1?Response::allow():Response::deny('You must be an owner'));
    }
}

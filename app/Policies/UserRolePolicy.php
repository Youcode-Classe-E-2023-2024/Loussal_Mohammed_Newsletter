<?php

namespace App\Policies;

use App\Models\User;

class UserRolePolicy
{
    /**
     * @param User $user
     * @return bool
     */
    public function assignRole(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * @param User $user
     * @return bool
     */
    public function removeRole(User $user): bool
    {
        return $user->role === 'admin';
    }
}

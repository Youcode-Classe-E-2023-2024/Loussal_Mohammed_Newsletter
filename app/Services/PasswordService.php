<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class PasswordService
{

    /**
     * @param User $user
     * @param string $newPassword
     * @return void
     */
    public function editPassword(User $user, string $newPassword) {
        $user->update(['password' => Hash::make($newPassword)]);
    }
}

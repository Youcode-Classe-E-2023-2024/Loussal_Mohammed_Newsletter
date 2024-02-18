<?php

namespace App\Providers;

use Spatie\Permission\Models\Permission;
use App\Models\User;
class usersPermissionsProvider
{
    public function admin(User $user) {
        $user->givePermissionTo('manage users');
        $user->givePermissionTo('create media');
        $user->givePermissionTo('list media');
        $user->givePermissionTo('manage newsletter');
    }
    public function redactor(User $user) {
        $user->givePermissionTo('create media');
        $user->givePermissionTo('list media');
        $user->givePermissionTo('manage newsletter');

    }
}
